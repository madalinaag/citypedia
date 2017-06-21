<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
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
     *     {"name"="gid", "dataType"="array[sting]", "description"="Displays the places matching the ids."},
     *  },
     *    )
     * @param Request $request
     * @return \FOS\RestBundle\View\View
     */
    public function getRecommendationAction(Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $gIdString =  $request->query->get('gid');
        $gId = explode(',', $gIdString);

        /** @var AppBundle/Repository/PlaceRepository $placeRepo */
        $placeRepo = $entityManager->getRepository('AppBundle:App\Place');

        $places = $placeRepo->getRecommendations($gId);

        $view = $this->view($places, Response::HTTP_OK);

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