<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 02-04-2015
 * Time: 15:31
 */

namespace Test\UserLikesBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;

class User
{


    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var ArrayCollection
     */
    private $postLikes;


    public function __construct()
    {
        $this->postLikes = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


    public function addPostLike(Post $post)
    {
        $this->postLikes[] = $post;

    }

    public function removePostLike(Post $post)
    {
        $this->postLikes->removeElement($post);;

    }

    /**
     * @return ArrayCollection
     */
    public function getPostLikes()
    {
        return $this->postLikes;
    }

}