<?php
/**
 * Created by PhpStorm.
 * User: Madalina
 * Date: 3/11/2016
 * Time: 10:34 AM
 */

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * @RouteResource("Keyword")
 *
 * Class KeywordController
 * @package AppBundle\Controller
 */
class KeywordController extends FOSRestController
{
    /**
     * @Rest\Get("/keyword/read")
     *
     * @ApiDoc(
     *  resource="Keyword",
     *  description="Reads keywords",
     *  statusCodes={
     *      200="Returned when successful",
     *  },
     * )
     *
     * @return \FOS\RestBundle\View\View
     */
    public function getReadAction(){

        $entityManager = $this->getDoctrine()->getManager();
        $keywordRepo = $entityManager->getRepository('AppBundle:App\Keyword');

        $keywords = $keywordRepo->getKeywords();

        $view = $this->view($keywords, Response::HTTP_OK);

        return $view;
    }
}