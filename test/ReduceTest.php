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

use function Phayne\Phunctional\reduce;

/**
 * Class ReduceTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class ReduceTest extends TestCase
{
    public function testShouldReduceTheValuesOfACollectionAfterApplyAFunction(): void
    {
        $coll = [1, 2, 3, 4, 5];
        $fn   = $this->sum();

        $this->assertSame(15, reduce($fn, $coll));
    }

    public function testShouldReduceTheValuesOfACollectionAfterApplyAFunctionUsingAnInitialValue(): void
    {
        $coll    = [1, 2, 3, 4, 5];
        $initial = 5;
        $fn      = $this->sum();

        $this->assertSame(20, reduce($fn, $coll, $initial));
    }

    public function testShouldAllowReduceTheValuesOfACollectionDependingOnTheKeyOfEachValue(): void
    {
        $coll    = [1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five'];
        $initial = '';
        $fn      = $this->concatValuesOfOddKeys();

        $this->assertSame('one three five', reduce($fn, $coll, $initial));
    }

    private function sum(): callable
    {
        return static function ($acc, $value) {
            return $acc + $value;
        };
    }

    private function concatValuesOfOddKeys(): callable
    {
        return static function ($acc, $value, $key) {
            return $key % 2 === 1
                ? trim($acc . ' ' . $value)
                : $acc;
        };
    }
}
