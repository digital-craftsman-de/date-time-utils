<?php

declare(strict_types=1);

namespace DigitalCraftsman\DateTimePrecision\DateTime;

use DigitalCraftsman\DateTimePrecision\DateTime;
use PHPUnit\Framework\TestCase;

/** @coversDefaultClass \DigitalCraftsman\DateTimePrecision\DateTime */
final class IsNotEqualToTest extends TestCase
{
    /**
     * @test
     *
     * @dataProvider dataProvider
     *
     * @covers ::isNotEqualTo
     */
    public function is_not_equal_to_works(
        bool $expectedResult,
        DateTime $dateTime,
        DateTime $comparator,
    ): void {
        // -- Act & Assert
        self::assertSame($expectedResult, $dateTime->isNotEqualTo($comparator));
    }

    /**
     * @return array<string, array{
     *   0: boolean,
     *   1: DateTime,
     *   2: DateTime,
     * }>
     */
    public function dataProvider(): array
    {
        return [
            'is equal' => [
                false,
                DateTime::fromString('2022-10-08 15:00:00'),
                DateTime::fromString('2022-10-08 15:00:00'),
            ],
            'next year' => [
                true,
                DateTime::fromString('2022-10-08 15:00:00'),
                DateTime::fromString('2023-10-08 15:00:00'),
            ],
            'next month' => [
                true,
                DateTime::fromString('2022-10-08 15:00:00'),
                DateTime::fromString('2022-11-08 15:00:00'),
            ],
            'next day' => [
                true,
                DateTime::fromString('2022-10-08 15:00:00'),
                DateTime::fromString('2022-10-09 15:00:00'),
            ],
            'next hour' => [
                true,
                DateTime::fromString('2022-10-08 15:00:00'),
                DateTime::fromString('2022-10-08 16:00:00'),
            ],
            'next minute' => [
                true,
                DateTime::fromString('2022-10-08 15:00:00'),
                DateTime::fromString('2022-10-08 15:01:00'),
            ],
            'next second' => [
                true,
                DateTime::fromString('2022-10-08 15:00:00'),
                DateTime::fromString('2022-10-08 15:00:01'),
            ],
            'next millisecond' => [
                true,
                DateTime::fromString('2022-10-08 15:00:00'),
                DateTime::fromString('2022-10-08 15:00:00.000001'),
            ],
        ];
    }
}
