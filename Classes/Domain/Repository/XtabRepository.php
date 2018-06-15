<?php
namespace CGB\XtabGenerator\Domain\Repository;

/***
 *
 * This file is part of the "XTAB Generator" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Christoph Balogh <cb@lustige-informatik.at>
 *
 ***/

/**
 * The repository for Xtabs
 */
class XtabRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
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
