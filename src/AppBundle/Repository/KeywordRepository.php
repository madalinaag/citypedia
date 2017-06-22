<?php
/**
 * Created by PhpStorm.
 * User: Madalina
 * Date: 12/11/2016
 * Time: 8:37 PM
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class KeywordRepository extends EntityRepository
{
    public function getKeywordsForPlace($placeId) {
        $queryBuilder = $this->createQueryBuilder('K')
            ->select('K.name')
            ->join('K.places', 'P')
            ->where('P.id = :placeId')
            ->setParameter('placeId', $placeId);

        $result = $queryBuilder->getQuery()->getScalarResult();

        $ids = array_map('current', $result);

        return $ids;
    }

    public function getKeywords() {
        $queryBuilder = $this->createQueryBuilder('K')
            ->select('K.id, K.name');

        $result = $queryBuilder->getQuery()->getArrayResult();

        return $result;
    }
}