<?php
namespace Gradwell\SMSAPI\Test;

use Gradwell\SMSAPI\Message;
use Gradwell\SMSAPI\Response;

class ServiceTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        \Mockery::close();
    }

    /**
     * @test
     */
    public function testBulkSMSCallsSend()
    {
        // Stub send
        $mock = \Mockery::mock('Gradwell\SMSAPI\Service')->makePartial();
        $mock->shouldReceive('send')->withAnyArgs()->times(5)->andReturn();

        $messages = array(
            new Message('1', '1', 'Test'),
            new Message('1', '1', 'Test'),
            new Message('1', '1', 'Test'),
            new Message('1', '1', 'Test'),
            new Message('1', '1', 'Test')
        );

        $mock->sendBulk($messages);
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function testBulkSMSRequiresArray()
    {
        // Stub send
        $mock = \Mockery::mock('Gradwell\SMSAPI\Service')->makePartial();
        $mock->shouldReceive('send')->withAnyArgs()->andReturn();

        $mock->sendBulk(123);
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function testBulkSMSRequiresArrayOfMessage()
    {
        // Stub send
        $mock = \Mockery::mock('Gradwell\SMSAPI\Service')->makePartial();
        $mock->shouldReceive('send')->withAnyArgs()->andReturn();

        $messages = array(
            new Message('1', '1', 'Test'),
            new Message('1', '1', 'Test'),
            new Message('1', '1', 'Test'),
            null,
            new Message('1', '1', 'Test')
        );

        $mock->sendBulk($messages);
    }
}
