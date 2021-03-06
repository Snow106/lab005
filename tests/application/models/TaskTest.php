<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{

    function setUp()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('task');
        $this->item = new Task();
        $this->item->task ='task';
        $this->item->priority = 1;
        $this->item->size = 2;
        $this->item->group = 3;
    }

    function testSetup() {
        $this->assertEquals('task', $this->item->task);
        $this->assertEquals(1, $this->item->priority);
        $this->assertEquals(2, $this->item->size);
        $this->assertEquals(3, $this->item->group);
    }

    function testValidTask() {
        $expected = 123;
        $this->item->task = $expected;
        $this->assertEquals($expected, $this->item->task);
    }

    /**
     * This is an alternate way to assert that an exception should occur
     * @expectedException InvalidArgumentException
     */
    function testInvalidTask() {
        //  $this->expectException('InvalidArgumentException');
        $this->item->task = null;
    }

    function testPriorityPresent() {
        $expected = 2;
        $this->item->priority = $expected;
        $this->assertEquals($expected, $this->item->priority);
    }

    function testSizePresent() {
        $expected = 3;
        $this->item->size = $expected;
        $this->assertEquals($expected, $this->item->size);
    }

    function testGroupPresent() {
        $expected = 4;
        $this->item->group = $expected;
        $this->assertEquals($expected, $this->item->group);
    }

    function testInvalidPriority() {
        $badvalue = 5;
        $this->expectException(Exception::class);
        $this->item->priority = $badvalue; // this should croak
        $badvalue = -0;
        $this->expectException(Exception::class);
        $this->item->priority = $badvalue; // this should croak
    }

    function testnvalidSize() {
        $badvalue = 10;
        $this->expectException(Exception::class);
        $this->item->size = $badvalue; // this should croak
        $badvalue = -1;
        $this->expectException(Exception::class);
        $this->item->size = $badvalue; // this should croak
    }

    function testnvalidGroup() {
        $badvalue = 10;
        $this->expectException(Exception::class);
        $this->item->group = $badvalue; // this should croak
        $badvalue = -1;
        $this->expectException(Exception::class);
        $this->item->group = $badvalue; // this should croak
    }
}
