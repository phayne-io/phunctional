<?php

/**
 * This file is part of phayne-io/phunctional package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see       https://github.com/phayne-io/phunctional for the canonical source repository
 * @copyright Copyright (c) 2023 Phayne. (https://phayne.io)
 */

declare(strict_types=1);

namespace Phayne\Phunctional\Tests;

use ArrayIterator;
use PHPUnit\Framework\TestCase;

use function Phayne\Phunctional\get;

/**
 * Class GetTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class GetTest extends TestCase
{
    public function testShouldReturnTheValueOfTheItemOfAnExistentKey(): void
    {
        $actual = ['one' => 1, 'two' => 2];

        $this->assertSame(2, get('two', $actual));
    }

    public function testShouldReturnTheValueOfTheItemOfAnExistentPropertyOfATraversable(): void
    {
        $traversable = new ArrayIterator(['one' => 1, 'two' => 2]);

        $this->assertSame(2, get('two', $traversable));
    }

    public function testShouldReturnNullIfTheKeyDoesNotExistsAndNotDefaultValueIsProvided(): void
    {
        $actual = ['one' => 1, 'two' => 2];

        $this->assertNull(get('three', $actual));
    }

    public function testShouldReturnNullIfThePropertyDoesNotExistsAndNotDefaultValueIsProvided(): void
    {
        $traversable = new ArrayIterator(['one' => 1, 'two' => 2]);

        $this->assertNull(get('three', $traversable));
    }

    public function testShouldReturnTheDefaultValueProvidedIfTheKeyDoesNotExists(): void
    {
        $actual = ['one' => 1, 'two' => 2];

        $this->assertSame(3, get('three', $actual, 3));
    }

    public function testShouldReturnTheDefaultValueProvidedIfThePropertyDoesNotExists(): void
    {
        $traversable = new ArrayIterator(['one' => 1, 'two' => 2]);

        $this->assertSame(3, get('three', $traversable, 3));
    }

    public function testShouldReturnTheValueOfTheItemOfAnExistentFalsePropertyOfATraversable(): void
    {
        $traversable = new ArrayIterator(['one' => null, 'two' => false]);

        $this->assertNull(get('one', $traversable, 'default'));
        $this->assertFalse(get('two', $traversable, true));
    }
}
