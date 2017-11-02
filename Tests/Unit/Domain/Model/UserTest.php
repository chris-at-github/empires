<?php
namespace Datamints\DatamintsPlay\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Christian Pschorr <c.pschorr@datamints.com>
 */
class UserTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Datamints\DatamintsPlay\Domain\Model\User
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Datamints\DatamintsPlay\Domain\Model\User();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function dummyTestToNotLeaveThisFileEmpty()
    {
        self::markTestIncomplete();
    }
}
