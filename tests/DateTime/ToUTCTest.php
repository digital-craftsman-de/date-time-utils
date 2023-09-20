<?php

declare(strict_types=1);

namespace DigitalCraftsman\DateTimeParts\DateTime;

use DigitalCraftsman\DateTimeParts\DateTime;
use DigitalCraftsman\DateTimeParts\Time;
use PHPUnit\Framework\TestCase;

/** @coversDefaultClass \DigitalCraftsman\DateTimeParts\DateTime */
final class ToUTCTest extends TestCase
{
    /**
     * @test
     *
     * @covers ::toUTC
     * @covers ::timezone
     */
    public function to_utc_works(): void
    {
        // -- Arrange
        $dateTime = new DateTime(new \DateTimeImmutable(
            '2022-10-07 14:39:24',
            new \DateTimeZone('Europe/Berlin'),
        ));

        // -- Act
        $dateTimeInUTC = $dateTime->toUTC();

        // -- Assert
        self::assertEquals(
            $dateTimeInUTC->timezone(),
            new \DateTimeZone('UTC'),
        );
        self::assertTrue(
            $dateTimeInUTC->time()->isEqualTo(Time::fromString('12:39:24')),
        );
    }
}
