<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 02-04-2015
 * Time: 15:31
 */

namespace Test\UserLikesBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;

class Post
{


    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;



    /**
     * @var ArrayCollection
     */
    private $userLikes;

    public function __construct()
    {
        $this->userLikes = new ArrayCollection();
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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $desc
     */
    public function setContent($desc)
    {
        $this->content = $desc;
    }




    /**
     * @return ArrayCollection
     */
    public function getUserLikes()
    {
        return $this->userLikes;
    }

    /**
     * @param User $user
     * @internal param ArrayCollection $userLikes
     */
    public function setUserLikes(User $user)
    {
        $this->userLikes[] = $user;
    }


    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}