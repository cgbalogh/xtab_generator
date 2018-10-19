<?php
namespace CGB\XtabGenerator\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class XtabTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\XtabGenerator\Domain\Model\Xtab
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\XtabGenerator\Domain\Model\Xtab();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAggregateObjectReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAggregateObject()
        );
    }

    /**
     * @test
     */
    public function setAggregateObjectForStringSetsAggregateObject()
    {
        $this->subject->setAggregateObject('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'aggregateObject',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDetailObjectReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDetailObject()
        );
    }

    /**
     * @test
     */
    public function setDetailObjectForStringSetsDetailObject()
    {
        $this->subject->setDetailObject('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'detailObject',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTemplateReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTemplate()
        );
    }

    /**
     * @test
     */
    public function setTemplateForStringSetsTemplate()
    {
        $this->subject->setTemplate('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'template',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getRowheaderReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getRowheader()
        );
    }

    /**
     * @test
     */
    public function setRowheaderForStringSetsRowheader()
    {
        $this->subject->setRowheader('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'rowheader',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getColheaderReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getColheader()
        );
    }

    /**
     * @test
     */
    public function setColheaderForStringSetsColheader()
    {
        $this->subject->setColheader('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'colheader',
            $this->subject
        );
    }
}
