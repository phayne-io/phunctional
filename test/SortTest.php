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

use function Phayne\Phunctional\sort;

/**
 * Class SortTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class SortTest extends TestCase
{
    public function testShouldSortACollection(): void
    {
        $coll   = [9, 1, 2, 3, 4, 1, 5, 6, 7, 4, 9, 8];
        $sorted = [1, 1, 2, 3, 4, 4, 5, 6, 7, 8, 9, 9];

        $this->assertSame($sorted, sort($this->rank(), $coll));
    }

    public function testShouldSortAnEmptyCollection(): void
    {
        $this->assertSame([], sort($this->rank(), new ArrayIterator()));
    }

    private function rank(): callable
    {
        return static function ($one, $other) {
            return $one === $other ? 0 : ($one > $other ? 1 : -1);
        };
    }
}
