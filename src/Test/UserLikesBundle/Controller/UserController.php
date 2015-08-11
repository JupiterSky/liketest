<?php

namespace Test\UserLikesBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Test\UserLikesBundle\Entity\User;
use Test\UserLikesBundle\Repository\UserRepositoryDoctrine;


class UserController extends FOSRestController implements ClassResourceInterface
{


    /**
     * @param Request $request the request object
     * @return array
     */
    public function cgetAction(Request $request)
    {

        return $this->getUserManager()->findAll();
    }

    /**
     * @return UserRepositoryDoctrine
     */
    private function getUserManager()
    {
        return $this->get('test.user.repository');
    }


    /**
     * @param Request $request the request object
     *
     * @return array
     */
    public function getLikesAction(Request $request, $userID)
    {

        return $this->getUserEntity($userID)->getPostLikes();
    }


    /**
     *
     * @param Request $request the request object
     * @param UserId
     * @return array
     */
    public function postLikeAction(Request $request, $id)
    {
        $paramters = $this->getPostParamters($request);


        if (isset($paramters["post_id"])) {
            $post = $this->getPostEntity($paramters["post_id"]);
        }

        $user = $this->getUserEntity($id);
        $user->addPostLike($post);
        $manager = $this->getObjectManager();
        $manager->persist($user);
        $manager->persist($post);
        $manager->flush();

        return [
            "message" => "OK LIKED"
        ];
    }


    /**
     * @return EntityManagerInterface;
     */
    private function getObjectManager()
    {

        return $this->get("doctrine.orm.entity_manager");
    }


    /**
     * @param $id
     * @return User
     *
     */
    protected function getUserEntity($id)
    {
        if (!$resource = $this->getUserManager()->find($id)) {
            throw new NotFoundHttpException('Resource not found.');
        }

        return $resource;
    }

    /**
     * @param $noteId
     * @return mixed
     */
    protected function getPostEntity($noteId)
    {
        if (!$resource = $this->getPostManager()->find($noteId)) {
            throw new NotFoundHttpException('Resource not found.');
        }

        return $resource;
    }

    /**
     * @return PostRepositoryDoctrine
     */
    private function getPostManager()
    {
        return $this->get('post.repository');
    }

    /**
     * @param Request $request
     */
    protected function getPostParamters(Request $request)
    {
        $content = $request->getContent();

        if (!empty($content)) {
            return json_decode($content, true); // 2nd param to get as array
        }

        return array();
    }


}