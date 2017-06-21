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
 * @RouteResource("Category")
 *
 * Class CategoryController
 * @package AppBundle\Controller
 */
class CategoryController extends FOSRestController
{
    /**
     * @Rest\Get("/category/read")
     *
     * @ApiDoc(
     *  resource="Category",
     *  description="Reads categories",
     *  statusCodes={
     *      200="Returned when successful",
     *  },
     * )
     *
     * @return \FOS\RestBundle\View\View
     */
    public function getReadAction(){

        $entityManager = $this->getDoctrine()->getManager();
        $categoryRepo = $entityManager->getRepository('AppBundle:App\Category');

        $categories = $categoryRepo->getCategories();

        $view = $this->view($categories, Response::HTTP_OK);

        return $view;
    }
}