<?php
namespace Gradwell\SMSAPI\Test;

use Gradwell\SMSAPI\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testOkStatusCode()
    {
        $response = new Response("OK:Message sent");
        $this->assertTrue($response->isSuccessful());
    }

    /**
     * @test
     */
    public function testErrorStatusCode()
    {
        $response = new Response("ERR:Invalid authentication");
        $this->assertFalse($response->isSuccessful());
    }

    /**
     * @test
     */
    public function testUnknownStatusCode()
    {
        $response = new Response("derpderpherpderp");
        $this->assertFalse($response->isSuccessful());
    }

    /**
     * @test
     */
    public function testOkStatusMessage()
    {
        $response = new Response("OK:Message sent");
        $this->assertEquals("Message sent", $response->getStatusMessage());
    }

    /**
     * @test
     */
    public function testErrorStatusMessage()
    {
        $response = new Response("ERR:Invalid authentication");
        $this->assertEquals("Invalid authentication", $response->getStatusMessage());
    }

    /**
     * @test
     */
    public function testUnknownStatusMessage()
    {
        $response = new Response("derpderpherpderp");
        $this->assertEquals("derpderpherpderp", $response->getStatusMessage());
    }
}
