<?php

/**
 * This file is part of phayne-io/phunctional and is proprietary and confidential.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 *
 * @see       https://github.com/phayne-io/phunctional for the canonical source repository
 * @copyright Copyright (c) 2023-2023 Phayne. (https://phayne.io)
 */

declare(strict_types=1);

namespace Phayne\Phunctional\Tests;

use PHPUnit\Framework\TestCase;

use function Phayne\Phunctional\key;

/**
 * Class KeyTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class KeyTest extends TestCase
{
    public function testShouldReturnTheValueOfTheItemOfAnExistentKey(): void
    {
        $actual = ['one' => 1, 'two' => 2];

        $this->assertSame('two', key(2, $actual));
    }

    public function testShouldReturnNullIfTheKeyDoesNotExistsAndNotDefaultValueIsProvided(): void
    {
        $actual = ['one' => 1, 'two' => 2];

        $this->assertNull(key(3, $actual));
    }

    public function testShouldReturnTheDefaultValueProvidedIfTheKeyDoesNotExists(): void
    {
        $actual = ['one' => 1, 'two' => 2];

        $this->assertSame('three', key(3, $actual, 'three'));
    }

    public function testShouldReturnEmptyStringIfTheKeyDoesIsEmpty(): void
    {
        $actual = ['one' => 1, 'two' => 2, '' => 3];

        $this->assertSame('', key(3, $actual, 'default'));
    }

    public function testShouldReturnTheValueOfTheItemOfAnExistentBooleanKey(): void
    {
        $actual = ['one' => 1, 'two' => false];

        $this->assertSame('two', key(false, $actual, 'default'));
    }

    public function testShouldReturnFirstOccurrenceOfTheItemOfAnExistentKey(): void
    {
        $actual = [false => 1];

        $this->assertSame(0, key(1, $actual, 'default'));
    }
}
