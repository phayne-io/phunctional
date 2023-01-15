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

use function Phayne\Phunctional\apply;
use function Phayne\Phunctional\first;

/**
 * Class FirstTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class FirstTest extends TestCase
{
    /**
     * @dataProvider getNonEmptyCollections
     */
    public function testShouldReturnTheValueOfTheFirstItemOfANonEmptyCollection($coll): void
    {
        $this->assertSame(1, first($coll));
    }

    /**
     * @dataProvider getEmptyCollections
     */
    public function testShouldReturnNullOnEmptyCollection($coll): void
    {
        $this->assertNull(first($coll));
    }

    public function getNonEmptyCollections(): array
    {
        return [
            'array'           => ['coll' => [1, 2]],
            'array_with_keys' => ['coll' => ['one' => 1, 'two' => 2]],
            'iterator'        => ['coll' => new ArrayIterator([1, 2])],
            'generator'       => [
                'coll' => apply(
                    static function () {
                        yield 1;
                        yield 2;
                    }
                ),
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
