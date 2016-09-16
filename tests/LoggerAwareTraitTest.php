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

/**
 * @covers \SR\Log\LoggerAwareTrait
 */
class LoggerAwareTraitTest extends \PHPUnit_Framework_TestCase
{
    public function testLogMethods()
    {
        $methods = ['debug', 'info', 'notice', 'warning', 'error', 'critical', 'alert', 'emergency'];

        foreach ($methods as $m) {
            $this->doLogMethodRun($m);
        }
    }

    /**
     * @dataProvider methodDataProvider
     */
    public function doLogMethodRun($method)
    {
        $logInterface = $this->getLoggerMock([$method]);
        $logAwareTrait = $this->getLoggerTraitMock();

        $logInterface
            ->expects($this->once())
            ->method($method)
            ->with('A log message');

        $logAwareTrait->setLogger($logInterface);
        $traitMethod = 'log'.ucfirst($method);

        $rc = new \ReflectionObject($logAwareTrait);
        $rm = $rc->getMethod($traitMethod);
        $rm->setAccessible(true);
        $rm->invoke($logAwareTrait, 'A log message');
    }

    public function testGetterAndHaser()
    {
        $logInterface = $this->getLoggerMock();
        $logAwareTrait = $this->getLoggerTraitMock();

        $this->assertFalse($logAwareTrait->hasLogger());
        $logAwareTrait->setLogger($logInterface);
        $this->assertInstanceOf(LoggerInterface::class, $logAwareTrait->getLogger());
        $this->assertTrue($logAwareTrait->hasLogger());
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|LoggerAwareTrait
     */
    private function getLoggerTraitMock()
    {
        return $this
            ->getMockBuilder('SR\Log\LoggerAwareTrait')
            ->getMockForTrait();
    }

    /**
     * @param array $methods
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|LoggerInterface
     */
    private function getLoggerMock(array $methods = [])
    {
        $builder = $this->getMockBuilder('Psr\Log\LoggerInterface');

        if (count($methods) > 0) {
            $builder->setMethods($methods);
        }

        return $builder->getMockForAbstractClass();
    }
}

/* EOF */
