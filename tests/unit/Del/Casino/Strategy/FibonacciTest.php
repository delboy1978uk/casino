<?php

namespace Del\Casino\Strategy;

use ReflectionClass;

class FibonacciTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    /**
     * @var Fibonacci
     */
    protected $fib;

    protected function _before()
    {
        $this->fib = new Fibonacci();
    }

    protected function _after()
    {
        unset($this->fib);
    }

    public function testGetLevel()
    {
        $this->assertEquals(3,$this->invokeMethod($this->fib,'getLevel',[3]));
        $this->assertEquals(6,$this->invokeMethod($this->fib,'getLevel',[13]));
        $this->assertEquals(8,$this->invokeMethod($this->fib,'getLevel',[34]));
        $this->assertEquals(10,$this->invokeMethod($this->fib,'getLevel',[89]));
        $this->assertEquals(4,$this->invokeMethod($this->fib,'getLevel',[5]));
    }

    public function testGetAmount()
    {
        $this->assertEquals(2,$this->invokeMethod($this->fib,'getAmount',[3]));
        $this->assertEquals(3,$this->invokeMethod($this->fib,'getAmount',[4]));
        $this->assertEquals(8,$this->invokeMethod($this->fib,'getAmount',[6]));
        $this->assertEquals(34,$this->invokeMethod($this->fib,'getAmount',[9]));
        $this->assertEquals(144,$this->invokeMethod($this->fib,'getAmount',[12]));
    }

    public function testGetRecommendedBet()
    {
        $this->assertEquals(5,$this->fib->getRecommendedBet(20));
        $this->assertEquals(13,$this->fib->getRecommendedBet(40));
        $this->assertEquals(13,$this->fib->getRecommendedBet(54));
        $this->assertEquals(13,$this->fib->getRecommendedBet(55));
        $this->assertEquals(21,$this->fib->getRecommendedBet(56));
    }

    /**
     * This method allows us to test protected and private methods without
     * having to go through everything using public methods
     *
     * @param object &$object
     * @param string $methodName
     * @param array  $parameters
     *
     * @return mixed could return anything!.
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
        return $method->invokeArgs($object, $parameters);
    }
}
