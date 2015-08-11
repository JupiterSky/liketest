<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 04-02-2015
 * Time: 13:01
 */

namespace Test\UserLikesBundle\Repository;


interface LikeInterface
{


    public function like();
    public function unlike();


}