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

use function Phayne\Phunctional\apply;
use function Phayne\Phunctional\last;

/**
 * Class LastTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class LastTest extends TestCase
{
    /**
     * @dataProvider getNonEmptyCollections
     */
    public function testShouldReturnTheValueOfTheLastItemOfANonEmptyCollection($coll, $expected): void
    {
        $this->assertSame($expected, last($coll));
    }

    /**
     * @dataProvider getEmptyCollections
     */
    public function testShouldReturnNullOnEmptyCollection($coll): void
    {
        $this->assertNull(last($coll));
    }

    public function getNonEmptyCollections(): array
    {
        return [
            'array'           => ['coll' => [1, 2], 'expected' => 2],
            'array_with_keys' => ['coll' => ['one' => 1, 'two' => 2], 'expected' => 2],
            'iterator'        => ['coll' => new ArrayIterator([1, 2]), 'expected' => 2],
            'generator'       => [
                'coll'     => apply(
                    static function () {
                        yield 1;
                        yield 2;
                    }
                ),
                'expected' => 2,
            ],
        ];
    }

    public function getEmptyCollections(): array
    {
        return [
            'array'    => ['coll' => []],
            'iterator' => ['coll' => new ArrayIterator()],
        ];
    }
}
