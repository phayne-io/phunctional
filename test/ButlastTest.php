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
use function Phayne\Phunctional\butlast;

/**
 * Class ButlastTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class ButlastTest extends TestCase
{
    /**
     * @dataProvider getNonEmptyCollections
     */
    public function testShouldReturnTheCollectionWithoutTheLastElementPreservingTheKeys($coll, $expected): void
    {
        $this->assertSame($expected, butlast($coll));
    }

    /**
     * @dataProvider getEmptyCollections
     */
    public function testShouldReturnAnEmptyCollectionWithEmptyCollections($coll): void
    {
        $this->assertSame([], butlast($coll));
    }

    /**
     * @test
     * @dataProvider getOneElementCollections
     */
    public function testShouldReturnAnEmptyCollectionWithOneElementCollections($coll): void
    {
        $this->assertSame([], butlast($coll));
    }

    public function getNonEmptyCollections(): array
    {
        return [
            'array'     => ['coll' => [1, 2, 3], 'expected' => [1, 2]],
            'iterator'  => ['coll' => new ArrayIterator([1, 2, 3]), 'expected' => [1, 2]],
            'generator' => ['coll' => $this->generator(1, 2, 3), 'expected' => [1, 2]],
        ];
    }

    public function getEmptyCollections(): array
    {
        return [
            'array'     => ['coll' => []],
            'iterator'  => ['coll' => new ArrayIterator([])],
            'generator' => ['coll' => $this->generator()],
        ];
    }

    public function getOneElementCollections(): array
    {
        return [
            'array'     => ['coll' => [1]],
            'iterator'  => ['coll' => new ArrayIterator([1])],
            'generator' => ['coll' => $this->generator(1)],
        ];
    }

    private function generator(...$items)
    {
        return apply(
            static function () use ($items) {
                foreach ($items as $item) {
                    yield $item;
                }
            }
        );
    }
}
