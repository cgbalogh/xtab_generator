<?php
namespace CGB\XtabGenerator\Domain\Model;

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
 * Xtab
 */
class Xtab extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Title
     *
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';

    /**
     * Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * Aggregate Object
     *
     * @var string
     */
    protected $aggregateObject = '';

    /**
     * detailObject
     *
     * @var string
     */
    protected $detailObject = '';

    /**
     * Template
     *
     * @var string
     */
    protected $template = '';

    /**
     * Row Header
     *
     * @var string
     */
    protected $rowheader = '';

    /**
     * Column Header
     *
     * @var string
     */
    protected $colheader = '';

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the aggregateObject
     *
     * @return string $aggregateObject
     */
    public function getAggregateObject()
    {
        return $this->aggregateObject;
    }

    /**
     * Sets the aggregateObject
     *
     * @param string $aggregateObject
     * @return void
     */
    public function setAggregateObject($aggregateObject)
    {
        $this->aggregateObject = $aggregateObject;
    }

    /**
     * Returns the detailObject
     *
     * @return string $detailObject
     */
    public function getDetailObject()
    {
        return $this->detailObject;
    }

    /**
     * Sets the detailObject
     *
     * @param string $detailObject
     * @return void
     */
    public function setDetailObject($detailObject)
    {
        $this->detailObject = $detailObject;
    }

    /**
     * Returns the template
     *
     * @return string $template
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Sets the template
     *
     * @param string $template
     * @return void
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    /**
     * Returns the rowheader
     *
     * @return string $rowheader
     */
    public function getRowheader()
    {
        return $this->rowheader;
    }

    /**
     * Sets the rowheader
     *
     * @param string $rowheader
     * @return void
     */
    public function setRowheader($rowheader)
    {
        $this->rowheader = $rowheader;
    }

    /**
     * Returns the colheader
     *
     * @return string $colheader
     */
    public function getColheader()
    {
        return $this->colheader;
    }

    /**
     * Sets the colheader
     *
     * @param string $colheader
     * @return void
     */
    public function setColheader($colheader)
    {
        $this->colheader = $colheader;
    }
}
