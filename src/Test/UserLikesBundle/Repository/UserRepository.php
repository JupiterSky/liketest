<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 04-02-2015
 * Time: 13:01
 */

namespace Test\UserLikesBundle\Repository;


interface UserRepository
{

    public function getTotalLikes($idUser);

}