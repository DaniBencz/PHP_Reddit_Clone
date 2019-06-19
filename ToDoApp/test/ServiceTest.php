<?php

require 'src/service.php';
use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
  function test_addNumbers()
  {
    //$service = new Service;
    $input1 = 3;
    $input2 = 4;
    $expected = 7;
    //$result = $service->addNumbers($input1, $input2);
    $result = addNumbers($input1, $input2);
    $this->assertEquals($expected, $result);
  }
}
