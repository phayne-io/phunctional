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
use function Phayne\Phunctional\rest;

/**
 * Class RestTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class RestTest extends TestCase
{
    /**
     * @dataProvider getNonEmptyCollections
     */
    public function testShouldReturnTheRestOfTheCollectionPreservingTheKeys($coll): void
    {
        $this->assertSame([1 => 2, 2 => 3], rest($coll));
    }

    /**
     * @dataProvider getEmptyCollections
     */
    public function testShouldReturnAnEmptyCollectionWithEmptyCollections($coll): void
    {
        $this->assertSame([], rest($coll));
    }

    /**
     * @dataProvider getOneElementCollections
     */
    public function testShouldReturnAnEmptyCollectionWithOneElementCollections($coll): void
    {
        $this->assertSame([], rest($coll));
    }

    public function getNonEmptyCollections(): array
    {
        return [
            'array'     => ['coll' => [1, 2, 3]],
            'iterator'  => ['coll' => new ArrayIterator([1, 2, 3])],
            'generator' => ['coll' => $this->generator(1, 2, 3)],
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
