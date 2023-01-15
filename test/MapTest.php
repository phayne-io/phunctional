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

use function Phayne\Phunctional\map;

/**
 * Class MapTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class MapTest extends TestCase
{
    public function testShouldReturnTheValuesOfACollectionAfterApplyAFunction(): void
    {
        $actual   = [1, 2, 3, 4, 5];
        $function = $this->multiplier(2);

        $this->assertSame([2, 4, 6, 8, 10], map($function, $actual));
    }

    public function testShouldReturnTheValuesOfACollectionAfterApplyAFunctionUsingAnIterator(): void
    {
        $actual   = new ArrayIterator([1, 2, 3, 4, 5]);
        $function = $this->multiplier(2);

        $this->assertSame([2, 4, 6, 8, 10], map($function, $actual));
    }

    public function testShouldKeepTheKeys(): void
    {
        $actual   = ['one' => 1, 'two' => 2, 'three' => 3, 'four' => 4, 'five' => 5];
        $function = $this->multiplier(2);

        $this->assertSame(['one' => 2, 'two' => 4, 'three' => 6, 'four' => 8, 'five' => 10], map($function, $actual));
    }

    public function testShouldAllowReceiveTheKeyInTheFunctionToApplyKeepingTheOriginalIndex(): void
    {
        $actual   = [1 => 1, 2 => 2, 3 => 3, 5 => 4, 7 => 5];
        $function = $this->keyPerValueMultiplier();

        $this->assertSame([1 => 1, 2 => 4, 3 => 9, 5 => 20, 7 => 35], map($function, $actual));
    }

    private function multiplier(int $times): callable
    {
        return static function ($value) use ($times) {
            return $value * $times;
        };
    }

    private function keyPerValueMultiplier(): callable
    {
        return static function ($value, $key) {
            return $value * $key;
        };
    }
}
