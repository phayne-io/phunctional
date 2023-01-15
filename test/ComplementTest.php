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

use function Phayne\Phunctional\complement;

/**
 * Class ComplementTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class ComplementTest extends TestCase
{
    /**
     * @dataProvider getNegatesValues()
     */
    public function testShouldReturnsTheOpposite($expected, callable $originalFn, $value): void
    {
        $complemented = complement($originalFn);

        $this->assertEquals($expected, $complemented($value));
    }

    public function getNegatesValues(): array
    {
        return [
            'is_not_null'                   => [
                'expected'    => false,
                'original_fn' => 'is_null',
                'value'       => null,
            ],
            'is_not_bigger_than_10_with_5'  => [
                'expected'    => true,
                'original_fn' => $this->isBiggerThanTen(),
                'value'       => 5,
            ],
            'is_not_bigger_than_10_with_10' => [
                'expected'    => false,
                'original_fn' => $this->isBiggerThanTen(),
                'value'       => 11,
            ],
        ];
    }

    private function isBiggerThanTen(): callable
    {
        return static function ($num) {
            return $num > 10;
        };
    }
}
