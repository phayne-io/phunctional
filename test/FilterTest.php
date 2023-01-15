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

use function Phayne\Phunctional\filter;

/**
 * Class FilterTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class FilterTest extends TestCase
{
    public function testShouldFilterACollectionKeepingTheIndexes(): void
    {
        $actual = ['one' => 1, 'two' => 2, 'three' => 3, 'four' => 4, 'five' => 5];
        $pred   = $this->evenByValueFilterer();

        $this->assertSame(['two' => 2, 'four' => 4], filter($pred, $actual));
    }

    public function testShouldFilterACollectionKeepingTheIndexesUsingAnIterator(): void
    {
        $actual = new ArrayIterator(['one' => 1, 'two' => 2, 'three' => 3, 'four' => 4, 'five' => 5]);
        $pred   = $this->evenByValueFilterer();

        $this->assertSame(['two' => 2, 'four' => 4], filter($pred, $actual));
    }

    public function testShouldFilterACollectionUsingTheirKeys(): void
    {
        $actual = [1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five'];
        $pred   = $this->evenByKeyFilterer();

        $this->assertSame([2 => 'two', 4 => 'four'], filter($pred, $actual));
    }

    private function evenByValueFilterer(): callable
    {
        return static function ($number) {
            return 0 === $number % 2;
        };
    }

    private function evenByKeyFilterer(): callable
    {
        return static function ($textNumber, $number) {
            return 0 === $number % 2;
        };
    }
}
