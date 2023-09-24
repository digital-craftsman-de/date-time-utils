<?php

declare(strict_types=1);

namespace DigitalCraftsman\DateTimePrecision\Date;

use DigitalCraftsman\DateTimePrecision\Date;
use PHPUnit\Framework\TestCase;

/** @coversDefaultClass \DigitalCraftsman\DateTimePrecision\Date */
final class IsAfterTest extends TestCase
{
    /**
     * @test
     *
     * @dataProvider dataProvider
     *
     * @covers ::isAfter
     */
    public function is_after_works(
        bool $expectedResult,
        Date $date,
        Date $comparator,
    ): void {
        // -- Act & Assert
        self::assertSame($expectedResult, $date->isAfter($comparator));
    }

    /**
     * @return array<string, array{
     *   0: boolean,
     *   1: Date,
     *   2: Date,
     * }>
     */
    public function dataProvider(): array
    {
        return [
            'previous year' => [
                false,
                Date::fromString('2021-10-08'),
                Date::fromString('2022-10-08'),
            ],
            'same date' => [
                false,
                Date::fromString('2022-10-08'),
                Date::fromString('2022-10-08'),
            ],
            'next year' => [
                true,
                Date::fromString('2023-10-08'),
                Date::fromString('2022-10-08'),
            ],
            'next month' => [
                true,
                Date::fromString('2022-11-08'),
                Date::fromString('2022-10-08'),
            ],
            'next day' => [
                true,
                Date::fromString('2022-10-09'),
                Date::fromString('2022-10-08'),
            ],
        ];
    }
}
