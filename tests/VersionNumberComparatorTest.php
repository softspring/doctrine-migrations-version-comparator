<?php

declare(strict_types=1);

namespace Softspring\Component\DoctrineMigrationsVersionComparator\Tests;

use Doctrine\Migrations\Version\Version;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Softspring\Component\DoctrineMigrationsVersionComparator\VersionNumberComparator;

#[CoversClass(VersionNumberComparator::class)]
class VersionNumberComparatorTest extends TestCase
{
    public function testItComparesMigrationShortClassNames(): void
    {
        $comparator = new VersionNumberComparator();

        $first = new Version(TestMigrationVersion0001::class);
        $second = new Version(TestMigrationVersion0002::class);

        self::assertSame(-1, $comparator->compare($first, $second));
        self::assertSame(1, $comparator->compare($second, $first));
        self::assertSame(0, $comparator->compare($first, $first));
    }

    public function testItIgnoresNamespacesAndUsesShortClassNames(): void
    {
        $comparator = new VersionNumberComparator();

        $first = new Version(TestMigrationVersion0010::class);
        $second = new Version(Alternative\TestMigrationVersion0009::class);

        self::assertSame(1, $comparator->compare($first, $second));
    }

    public function testItFallsBackToStringComparisonWhenReflectionFails(): void
    {
        $comparator = new VersionNumberComparator();

        $first = new Version('App\\Migrations\\Version20260326000100');
        $second = new Version('App\\Migrations\\Version20260326000200');

        self::assertSame(-1, $comparator->compare($first, $second));
        self::assertSame(1, $comparator->compare($second, $first));
    }
}

class TestMigrationVersion0001
{
}

class TestMigrationVersion0002
{
}

class TestMigrationVersion0010
{
}

namespace Softspring\Component\DoctrineMigrationsVersionComparator\Tests\Alternative;

class TestMigrationVersion0009
{
}
