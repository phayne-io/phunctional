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

use function Phayne\Phunctional\apply;
use function Phayne\Phunctional\pipe;

/**
 * Class PipeTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class PipeTest extends TestCase
{
    /**
     * @dataProvider calculatorProvider
     */
    public function testShouldComposeAFunctionsCombination($a, $b, $result): void
    {
        $calculator = pipe($this->multiplier(), $this->byTwoDivider());

        $this->assertSame($result, apply($calculator, [$a, $b]));
    }

    public function calculatorProvider(): array
    {
        return [
            ['a' => 5, 'b' => 10, 'result' => 25],
            ['a' => 1, 'b' => 10, 'result' => 5],
            ['a' => 3, 'b' => 20, 'result' => 30],
        ];
    }

    private function multiplier(): callable
    {
        return static function ($a, $b) {
            return $a * $b;
        };
    }

    private function byTwoDivider(): callable
    {
        return static function ($num) {
            return $num / 2;
        };
    }
}
