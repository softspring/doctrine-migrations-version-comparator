<?php

namespace Softspring\Component\DoctrineMigrationsVersionComparator;

use Doctrine\Migrations\Version\Comparator;
use Doctrine\Migrations\Version\Version;

class VersionNumberComparator implements Comparator
{
    public function compare(Version $a, Version $b): int
    {
        try {
            return (new \ReflectionClass("$a"))->getName() <=> (new \ReflectionClass("$b"))->getName();
        } catch (\ReflectionException $e) {
            return 0;
        }
    }
}
