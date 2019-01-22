<?php


namespace Tests;

use AppBundle\OrderParser;
use PHPUnit\Framework\TestCase;

class OrderParserTest extends TestCase
{
    /**
     * @test
     */
    public function shouldParseOrderFromJson()
    {
        $json = '{"id": 1345,"distributor": "ups","address": "Torslanda Torg 10|42332|TORSLANDA|SWEDEN","weight": 1.456}';
        $parser = new OrderParser();
        $order = $parser->fromJson($json);

        $this->assertEquals('ups', $order->getDistributor());
    }

}