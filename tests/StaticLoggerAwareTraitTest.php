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

use SR\Log\StaticLoggerAwareTrait;

/**
 * @covers \SR\Log\StaticLoggerAwareTrait
 */
class StaticLoggerAwareTraitTest extends AbstractTest
{
    /**
     * @dataProvider methodDataProvider
     */
    public function testLogger($method)
    {
        $this->logMethodRun($method, false);
    }

    public function testAccessors()
    {
        $this->logAccessorRun();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|StaticLoggerAwareTrait
     */
    protected function getLoggerTraitMock()
    {
        return $this
            ->getMockBuilder(StaticLoggerAwareTrait::class)
            ->getMockForTrait();
    }
}
