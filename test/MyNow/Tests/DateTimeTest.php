<?php
/*
 * This file is part of MyNow package.
 *
 * (c) Antony Zanetti
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use MyNow\MyNow;
use MyNow\DateTime;

class DateTimeTest extends \PHPUnit\Framework\TestCase
{
    private $fixturesFolder;

    protected function setUp(): void
    {
        $this->fixturesFolder = dirname(dirname(__DIR__)) . '/fixtures';
    }

    public function testDefault()
    {
        $now = new \DateTime();
        $now->setTimestamp(245671200);

        MyNow::create($this->fixturesFolder);

        $this->assertEquals(new DateTime(), $now);

        unset($GLOBALS['mynow']);
    }

    public function testDifferentNow()
    {
        $now = new \DateTime();

        MyNow::create($this->fixturesFolder);

        $this->assertNotEquals(new DateTime(), $now);

        unset($GLOBALS['mynow']);
    }

    public function testConstruct()
    {
        $date = date('Y-m-d');
        $now1 = new \DateTime($date);
        $now2 = new \MyNow\DateTime($date);

        $this->assertEquals($now1, $now2);
    }

    public function testFormat()
    {
        $test = 245671200;

        $now1 = new \DateTime();
        $now1->setTimestamp($test);

        MyNow::create($this->fixturesFolder);
        $now2 = new \MyNow\DateTime();

        $this->assertEquals($now1->format('Y-m-d'), $now2->format('Y-m-d'));
        $this->assertEquals($now1->format('Y-m-d H:i:s'), $now2->format('Y-m-d H:i:s'));
    }

    public function testFileNotExists()
    {
        MyNow::create('randompath' . rand(1, 100));

        $date = date('2019-06-01');
        $now1 = new \DateTime($date);
        $now2 = new \MyNow\DateTime($date);

        $this->assertEquals($now1, $now2);
    }
}