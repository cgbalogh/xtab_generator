<?php
namespace CGB\XtabGenerator\Domain\Repository;

/***
 *
 * This file is part of the "XtabGenerator" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017
 *
 ***/

/**
 * The repository for Generic
 */
class GenericRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * 
     * @return type
     */
    public function findBySqlQuery ($sql)
    {
        $query = $this->createQuery();
        $query->statement($sql);
        return $query->execute(true);
    }
}


