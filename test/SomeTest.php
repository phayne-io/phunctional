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

use function Phayne\Phunctional\some;

/**
 * Class SomeTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class SomeTest extends TestCase
{
    public function testShouldReturnFalseIfSomeValueSatisfiesThePredicate(): void
    {
        $coll = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $fn   = $this->isGreaterThanTen();

        $this->assertFalse(some($fn, $coll));
    }

    public function testShouldReturnTrueIfSomeValueSatisfiesThePredicate(): void
    {
        $coll = [25, 2, 3, 4, 5, 6, 7, 8, 9];
        $fn   = $this->isGreaterThanTen();

        $this->assertTrue(some($fn, $coll));
    }

    public function testShouldReturnTrueIfSomeValueSatisfiesThePredicateUsingTheKey(): void
    {
        $coll = ['one' => 1, 'two' => 2];
        $fn   = $this->isOne();

        $this->assertTrue(some($fn, $coll));
    }

    private function isGreaterThanTen(): callable
    {
        return static function ($number) {
            return $number > 10;
        };
    }

    private function isOne(): callable
    {
        return static function ($value, $key) {
            return 'one' === $key;
        };
    }
}
