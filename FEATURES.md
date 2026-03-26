# Doctrine Migrations Version Comparator Features

Functional definition for `softspring/doctrine-migrations-version-comparator`.

This file defines the expected behavior and scope of the component.

## Purpose

- Provide a Doctrine migrations comparator that sorts migration classes by their version class name.
- Keep migration execution order predictable when migration classes use names with sortable numeric suffixes.
- Integrate with Doctrine Migrations through Symfony service configuration.

## Main Features

- Implement Doctrine Migrations `Comparator`.
- Compare migrations using the short class name instead of the full namespace.
- Work as a drop-in replacement for the default comparator service in Doctrine Migrations.
- Allow bundle recipes and Symfony config to wire the comparator with minimal setup.

## Expected Usage

- Register the comparator service in Symfony.
- Alias `Doctrine\Migrations\Version\Comparator` to this implementation through `doctrine_migrations.services`.
- Use it in projects where migration class names are the intended ordering mechanism.

## Operational Expectations

- Migrations with valid class names should be sorted deterministically by short class name.
- Namespaces should not affect ordering when the short class name is the same comparison target.
- When reflection on the migration class name is not possible, the comparator should still produce a deterministic fallback comparison.

## Current Limits

- The component only changes comparison behavior; it does not generate migrations or alter migration metadata.
- It assumes Doctrine Migrations is already configured in the host application.
- It is useful mainly in projects that rely on migration class naming conventions for ordering.
