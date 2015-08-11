<?php

namespace Test\UserLikesBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Test\UserLikesBundle\Repository\PostRepositoryDoctrine;

class PostController extends FOSRestController implements ClassResourceInterface
{


    /**
     * @param Request $request the request object
     * @param ParamFetcherInterface $paramFetcher param fetcher service
     *
     * @return array
     */
    public function cgetAction(Request $request)
    {

        return $this->getPostManager()->findAll();
    }



    /**
     * @return PostRepositoryDoctrine
     */
    private function getPostManager()
    {
        return $this->get('post.repository');
    }


}