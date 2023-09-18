# Doctrine migrations version comparator

[![Latest Stable Version](https://poser.pugx.org/softspring/doctrine-migrations-version-comparator/v/stable.svg)](https://packagist.org/packages/softspring/doctrine-migrations-version-comparator)
[![Latest Unstable Version](https://poser.pugx.org/softspring/doctrine-migrations-version-comparator/v/unstable.svg)](https://packagist.org/packages/softspring/doctrine-migrations-version-comparator)
[![License](https://poser.pugx.org/softspring/doctrine-migrations-version-comparator/license.svg)](https://packagist.org/packages/softspring/doctrine-migrations-version-comparator)
[![PHP Version Require](http://poser.pugx.org/softspring/doctrine-migrations-version-comparator/require/php)](https://packagist.org/packages/softspring/doctrine-migrations-version-comparator)
[![Total Downloads](https://poser.pugx.org/softspring/doctrine-migrations-version-comparator/downloads)](https://packagist.org/packages/softspring/doctrine-migrations-version-comparator)
[![Build status](https://github.com/softspring/doctrine-migrations-version-comparator/actions/workflows/php.yml/badge.svg?branch=5.1)](https://github.com/softspring/doctrine-migrations-version-comparator/actions/workflows/php.yml)
![Coverage](https://raw.githubusercontent.com/softspring/doctrine-migrations-version-comparator/5.1/.github/badges/coverage.svg)

## Usage

This library is used for compare Doctrine migrations versions, and sort them by version name (usualy datetime)

```yaml
# config/packages/doctrine_migrations.yaml
services:
    Softspring\Component\DoctrineMigrationsVersionComparator\VersionNumberComparator: ~

doctrine_migrations:
    services:
        'Doctrine\Migrations\Version\Comparator': 'Softspring\Component\DoctrineMigrationsVersionComparator\VersionNumberComparator'
```

## License

This bundle is under the MIT license. See the complete license in the bundle [LICENSE](LICENSE) file.


