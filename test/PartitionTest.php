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
use function Phayne\Phunctional\partition;

/**
 * Class PartitionTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class PartitionTest extends TestCase
{
    /**
     * @dataProvider getValidCollections
     */
    public function testShouldPartitionACollection($coll, $partitionSize, $expected): void
    {
        $this->assertEquals($expected, partition($partitionSize, $coll));
    }

    public function getValidCollections(): array
    {
        return [
            'array'           => [
                'coll'          => [1, 2, 3, 4, 5, 6, 7],
                'partitionSize' => 2,
                'expected'      => [[0 => 1, 1 => 2], [2 => 3, 3 => 4], [4 => 5, 5 => 6], [6 => 7]],
            ],
            'array_with_keys' => [
                'coll'          => ['one' => 1, 'two' => 2, 'three' => 3],
                'partitionSize' => 2,
                'expected'      => [['one' => 1, 'two' => 2], ['three' => 3]],
            ],
            'iterator'        => [
                'coll'          => new ArrayIterator([1, 2, 3, 4, 5, 6, 7]),
                'partitionSize' => 2,
                'expected'      => [[0 => 1, 1 => 2], [2 => 3, 3 => 4], [4 => 5, 5 => 6], [6 => 7]],
            ],
            'generator'       => [
                'coll'          => apply(
                    static function () {
                        yield 1;
                        yield 2;
                        yield 3;
                        yield 4;
                        yield 5;
                        yield 6;
                        yield 7;
                    }
                ),
                'partitionSize' => 2,
                'expected'      => [[0 => 1, 1 => 2], [2 => 3, 3 => 4], [4 => 5, 5 => 6], [6 => 7]],
            ],
        ];
    }
}
