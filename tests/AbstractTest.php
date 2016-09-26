<?php

/*
 * This file is part of the `src-run/augustus-log-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace SR\Log\Test;

use Psr\Log\LoggerInterface;
use SR\Log\LoggerAwareTrait;
use SR\Log\StaticLoggerAwareTrait;
use SR\Reflection\Inspect;

abstract class AbstractTest extends \PHPUnit_Framework_TestCase
{
    public function methodDataProvider()
    {
        return [['debug'], ['info'], ['notice'], ['warning'], ['error'], ['critical'], ['alert'], ['emergency']];
    }

    public function logMethodRun($method, $static = false)
    {
        $logger = $this->getLoggerMock([$method]);
        $logAware = $this->getLoggerTraitMock();

        $logger
            ->expects($this->once())
            ->method($method)
            ->with('A log message');

        if ($static) {
            $logAware::setLogger($logger);
        } else {
            $logAware->setLogger($logger);
        }

        $traitMethod = 'log'.ucfirst($method);

        $method = Inspect::using($logAware)->getMethod($traitMethod);
        $method->invokeArgs($logAware, ['A log message']);
    }

    protected function logAccessorRun()
    {
        $logInterface = $this->getLoggerMock();
        $logAwareTrait = $this->getLoggerTraitMock();

        $this->assertFalse($logAwareTrait->hasLogger());

        $logAwareTrait->setLogger($logInterface);
        $this->assertInstanceOf(LoggerInterface::class, $logAwareTrait->getLogger());
        $this->assertTrue($logAwareTrait->hasLogger());
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|LoggerAwareTrait|StaticLoggerAwareTrait
     */
    abstract protected function getLoggerTraitMock();

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|LoggerInterface
     */
    protected function getLoggerMock(array $methods = [])
    {
        $builder = $this->getMockBuilder(LoggerInterface::class);

        if (count($methods) > 0) {
            $builder->setMethods($methods);
        }

        return $builder->getMockForAbstractClass();
    }
}
