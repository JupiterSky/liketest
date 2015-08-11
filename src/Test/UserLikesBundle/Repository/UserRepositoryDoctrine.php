<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 04-02-2015
 * Time: 13:05
 */

namespace Test\UserLikesBundle\Repository;



use Doctrine\ORM\EntityRepository;

class UserRepositoryDoctrine extends EntityRepository implements UserRepository
{


    public function getTotalLikes($idUser)
    {
        return $this->createQueryBuilder('s')
            ->join("s.postLikes","postLikes")
            ->select("COUNT(s.id)")
            ->where("s.id=$idUser")
            ->getQuery()
            ->getSingleScalarResult();
    }
}