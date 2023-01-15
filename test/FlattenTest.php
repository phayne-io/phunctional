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

use function Phayne\Phunctional\flatten;

/**
 * Class FlattenTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class FlattenTest extends TestCase
{
    public function testShouldFlatATwoMultidimensionalCollection(): void
    {
        $actual = [[1], [2], [3], [4], [5]];

        $this->assertSame([1, 2, 3, 4, 5], flatten($actual));
    }

    public function testShouldAllowOneMultidimensionalCollection(): void
    {
        $actual = [1, 2, 3, 4, 5];

        $this->assertSame($actual, flatten($actual));
    }

    public function testShouldFlatNestedMultidimensionalCollection(): void
    {
        $actual = [1, [2, 3], [4, [5, 6], [[[[[7, 8]]]]]]];

        $this->assertSame([1, 2, 3, 4, 5, 6, 7, 8], flatten($actual));
    }
}
