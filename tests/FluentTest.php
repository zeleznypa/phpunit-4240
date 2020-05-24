<?php

declare(strict_types=1);

namespace Zeleznypa\Phpunit4240;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass Zeleznypa\Phpunit4240\Fluent;
 */
class FluentTest extends TestCase
{
    /**
     * Tester of 4240 bug report code
     *
     * @return void
     * @coversNothing
     */
    public function testFoo(): void
    {
        $from = 'test';
        $fluent = $this->createFluentMock(['from']);
        $fluent->expects(self::once())
            ->method('from')
            ->with(self::equalTo($from))
            ->willReturnSelf();

        $fluent->from($from);
    }

    /**
     * Tester of from implementation
     *
     * @return void
     * @covers ::from
     */
    public function testFrom(): void
    {
        $from = 'test';
        $fluent = new Fluent();
        self::assertSame($from, $fluent->from($from)->getFrom());
    }

    // <editor-fold defaultstate="collapsed" desc="Helper">
    /**
     * Fluent mock factory
     *
     * @param string[] $methods [OPTIONAL] List of mocked method names
     * @return Fluent|MockObject
     */
    protected function createFluentMock(array $methods = []): MockObject
    {
        $mock = $this->createPartialMock(Fluent::class, $methods);
        return $mock;
    }

    // </editor-fold>
}
