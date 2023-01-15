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

use ArrayIterator;
use PHPUnit\Framework\TestCase;

use function Phayne\Phunctional\get_each;

/**
 * Class GetEachTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class GetEachTest extends TestCase
{
    public function testShouldReturnAnArrayWithValuesOfEachItemOfAnExistentKeyIndexedByIntegers(): void
    {
        $actual = [
            [
                'key'       => 1,
                'other_key' => 3
            ],
            [
                'key'       => 2,
                'other_key' => 4
            ]
        ];

        $this->assertSame([1, 2], get_each('key', $actual));
    }

    public function testShouldReturnAnArrayWithValuesOfEachItemOfAnExistentKey(): void
    {
        $actual = [
            'one' => [
                'key'       => 1,
                'other_key' => 3
            ],
            'two' => [
                'key'       => 2,
                'other_key' => 4
            ]
        ];

        $this->assertSame([1, 2], get_each('key', $actual));
    }

    public function testShouldReturnAnArrayWithValuesOfEachItemOfAnExistentPropertyOfATraversable(): void
    {
        $traversable = new ArrayIterator([
            'one' => [
                'key'       => 1,
                'other_key' => 3
            ],
            'two' => [
                'key'       => 2,
                'other_key' => 4
            ]
        ]);

        $this->assertSame([1, 2], get_each('key', $traversable));
    }

    public function testShouldReturnAnEmptyArrayIfTheKeyDoesNotExist(): void
    {
        $actual = [
            'one' => [
                'key'       => 1,
                'other_key' => 3
            ],
            'two' => [
                'key'       => 2,
                'other_key' => 4
            ]
        ];

        $this->assertSame([], get_each('not_existing_key', $actual));
    }

    public function testShouldReturnAnEmptyArrayIfThePropertyDoesNotExist(): void
    {
        $traversable = new ArrayIterator([
            'one' => [
                'key'       => 1,
                'other_key' => 3
            ],
            'two' => [
                'key'       => 2,
                'other_key' => 4
            ]
        ]);

        $this->assertSame([], get_each('not_existing_key', $traversable));
    }

    public function testShouldReturnAnArrayWithValuesOfEachItemOfAnExistentFalseValue(): void
    {
        $actual = [
            'one' => [
                'key'       => null,
                'other_key' => true
            ],
            'two' => [
                'key'       => false,
                'other_key' => true
            ]
        ];

        $this->assertSame([false], get_each('key', $actual));
    }

    public function testShouldReturnAnArrayWithValuesOfEachItemOfAnExistentFalsePropertyOfATraversable(): void
    {
        $traversable = new ArrayIterator([
            'one' => [
                'key'       => null,
                'other_key' => true
            ],
            'two' => [
                'key'       => false,
                'other_key' => true
            ]
        ]);

        $this->assertSame([false], get_each('key', $traversable));
    }
}
