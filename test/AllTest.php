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

use function Phayne\Phunctional\all;

/**
 * Class AllTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class AllTest extends TestCase
{
    public function testShouldReturnTrueIfThePredicateIsSatisfactory(): void
    {
        $numbers = [7, 9, 14, 12, 6];

        $this->assertTrue(all($this->isGreaterThanFive(), $numbers));
    }

    public function testShouldReturnFalseIfAnyValueIsNotSatisfactory(): void
    {
        $numbers = [2, 3, 14, 12, 6];

        $this->assertFalse(all($this->isGreaterThanFive(), $numbers));
    }

    private function isGreaterThanFive(): callable
    {
        return static function ($number) {
            return $number > 5;
        };
    }
}
