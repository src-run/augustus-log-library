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

/**
 * @covers \SR\Log\LoggerAwareTrait
 */
class LoggerAwareTraitTest extends \PHPUnit_Framework_TestCase
{
    public function testLogMethods()
    {
        $methods = [
            'debug',
            'info',
            'notice',
            'warning',
            'error',
            'critical',
            'alert',
            'emergency',
        ];

        foreach ($methods as $m) {
            $this->doLogMethodRun($m);
        }
    }

    /**
     * @dataProvider methodDataProvider
     */
    public function doLogMethodRun($method)
    {
        $loggerMock = $this
            ->getMockBuilder('Psr\Log\LoggerInterface')
            ->setMethods([$method])
            ->getMockForAbstractClass();

        $loggerMock
            ->expects($this->once())
            ->method($method)
            ->with('A log message');

        $traitMock = $this
            ->getMockBuilder('SR\Log\LoggerAwareTrait')
            ->getMockForTrait();

        $traitMock->setLogger($loggerMock);
        $traitMethod = 'log'.ucfirst($method);

        $rc = new \ReflectionObject($traitMock);
        $rm = $rc->getMethod($traitMethod);
        $rm->setAccessible(true);
        $rm->invoke($traitMock, 'A log message');
    }

    public function testGetterAndHaser()
    {
        $loggerMock = $this
            ->getMockBuilder('Psr\Log\LoggerInterface')
            ->getMockForAbstractClass();

        $traitMock = $this
            ->getMockBuilder('SR\Log\LoggerAwareTrait')
            ->getMockForTrait();

        $this->assertFalse($traitMock->hasLogger());
        $traitMock->setLogger($loggerMock);
        $this->assertInstanceOf(LoggerInterface::class, $traitMock->getLogger());
        $this->assertTrue($traitMock->hasLogger());
    }
}

/* EOF */
