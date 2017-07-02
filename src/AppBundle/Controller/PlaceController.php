<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\App\Keyword;
use AppBundle\Entity\App\Place;
use AppBundle\Repository\PlaceRepository;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * @RouteResource("Place")
 *
 * Class PlaceController
 * @package AppBundle\Controller
 */
class PlaceController extends FOSRestController
{
    /**
     * @Rest\Get("/place/read")
     *
     * @ApiDoc(
     *  resource="Places",
     *  description="Reads places",
     *  statusCodes={
     *      200="Returned when successful",
     *      404="Returned when the specified id is not found",
     *  },
     *  filters={
     *     {"name"="id", "dataType"="integer", "pattern"="\d+", "description"="Displays the details for the corresponding id."},
     *     {"name"="category", "dataType"="string", "description"="Display places from a certain category"},
     *  }
     * )
     *
     * @return \FOS\RestBundle\View\View
     */
    public function getReadAction(Request $request){

        $entityManager = $this->getDoctrine()->getManager();
        $placeRepo = $entityManager->getRepository('AppBundle:App\Place');

        $id =  $request->query->get('id');
        $category =  $request->query->get('category');

        $places = $placeRepo->getPlaces($id, $category);

        $view = $this->view($places, Response::HTTP_OK);

        return $view;
    }

    /**
    * @Rest\Get("/place/search")
    *
    * @ApiDoc(
    *  resource="Places",
    *  description="Searches places",
    *  statusCodes={
    *      200="Returned when successful",
    *      404="Returned when the specified id is not found",
    *  },
    * filters={
    *     {"name"="keys", "dataType"="array[string]", "description"="Displays the details for the corresponding id."},
    *     {"name"="category", "dataType"="string", "description"="Display places from a certain category"},
    *  }
    *    )
    * @param Request $request
    * @return \FOS\RestBundle\View\View
    */
    public function getsearchAction(Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $category =  $request->query->get('category');
        $keysString =  $request->query->get('keys');
        $keys = explode(',', $keysString);

        /** @var AppBundle/Repository/PlaceRepository $placeRepo */
        $placeRepo = $entityManager->getRepository('AppBundle:App\Place');
        $limit = count($keys) > 2 ? 2 : count($keys);
        $places = $placeRepo->getPlaces(null, $category);

        $finalResult = [];

        foreach ($places as $place) {
            $count = count(array_intersect($keys, $place['keys']));

            if ($count >= $limit) {
                $place['keyCount'] = $count;
                $finalResult[] = $place;
            }

        }

        usort($finalResult, [$this, "compareKeys"]);

        $places = [];
        foreach ($finalResult as $item) {
            unset($item['keyCount']);
            $places[] = $item;
        }

        $view = $this->view($places, Response::HTTP_OK);

        return $view;

    }

    /**
     * @Rest\Get("/place/recommendation/read")
     *
     * @ApiDoc(
     *  resource="Places",
     *  description="Recommend places",
     *  statusCodes={
     *      200="Returned when successful",
     *      404="Returned when the specified id is not found",
     *  },
     * filters={
     *     {"name"="id", "dataType"="array[sting]"},
     *  },
     *    )
     * @param Request $request
     * @return \FOS\RestBundle\View\View
     */
    public function getRecommendationAction(Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $place_id =  $request->query->get('id');

        /** @var PlaceRepository $placeRepo */
        $placeRepo = $entityManager->getRepository('AppBundle:App\Place');

        /** @var Place $place */
        $place = $placeRepo->find($place_id);
        $category = $place->getCategory();
        $keywords = $place->getKeywords();

        $recommendations = $placeRepo->getRecommendations($place_id, $category, $keywords);

        foreach ($keywords as $keyword) {
            $key[] = $keyword->getName();
        }

        foreach ($recommendations as $recommendation) {
            $data['id'] = $recommendation['id'];
            $data['score'] = count(array_diff($key, $recommendation['keys']));
            $recommendationsArray[] = $data;
        }

        usort($recommendationsArray, function($a, $b) {
            return $a['score'] - $b['score'];
        });

        $recommPlaceId = $recommendationsArray[0]['id'];
        /** @var Place $recommPlace */
        $recommPlace = $placeRepo->find($recommPlaceId);

        $response['id'] = $recommPlace->getId();
        $response['name'] = $recommPlace->getName();
        $response['image'] = $recommPlace->getImageUrl();

        $view = $this->view($response, Response::HTTP_OK);

        return $view;

    }

    /**
     * Compares 2 array elements by their keyCount key
     *
     * @param  array $a
     * @param  array $b
     *
     * @return int
     */
    protected function compareKeys($a, $b)
    {
        if ($a['keyCount'] > $b['keyCount']) {
            return 1;
        }

        if ($a['keyCount'] < $b['keyCount']) {
            return -1;
        }

        return 0;
    }
}