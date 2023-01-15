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

use function Phayne\Phunctional\partial;

/**
 * Class PartialTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class PartialTest extends TestCase
{
    public function testShouldBeAbleToFixArgumentsToAFunction(): void
    {
        $add5 = partial($this->sum(), 5);

        $this->assertEquals(10, $add5(5));
        $this->assertEquals(50, $add5(10, 15, 20));
    }

    public function testShouldReturnALazyFunctionIfNoArgumentsArePresent(): void
    {
        $sum = partial($this->sum());

        $this->assertEquals(7, $sum(2, 5));
    }

    private function sum(): callable
    {
        return static function (...$numbers) {
            return array_sum($numbers);
        };
    }
}
