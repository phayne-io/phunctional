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

use PHPUnit\Framework\TestCase;

use function Phayne\Phunctional\any;

/**
 * Class AnyTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class AnyTest extends TestCase
{
    public function testShouldReturnFalseIfAnyValueSatisfiesThePredicate(): void
    {
        $coll = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $fn   = $this->isGreaterThanTen();

        $this->assertFalse(any($fn, $coll));
    }

    public function testShouldReturnTrueIfAnyValueSatisfiesThePredicate(): void
    {
        $coll = [25, 2, 3, 4, 5, 6, 7, 8, 9];
        $fn   = $this->isGreaterThanTen();

        $this->assertTrue(any($fn, $coll));
    }

    private function isGreaterThanTen(): callable
    {
        return static function ($number) {
            return $number > 10;
        };
    }
}
