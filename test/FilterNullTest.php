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

use function Phayne\Phunctional\filter_null;

/**
 * Class FilterNullTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class FilterNullTest extends TestCase
{
    /**
     * @dataProvider collections
     */
    public function testShouldFilterACollectionDiscriminatingNulls($actual, $expected): void
    {
        $this->assertSame($expected, filter_null($actual));
    }

    public function collections(): array
    {
        return [
            'array'           => ['actual' => [1, 2, null], 'expected' => [1, 2]],
            'array_with_keys' => [
                'actual'   => ['one' => 1, 'two' => 2, 'three' => null, 'four' => false],
                'expected' => ['one' => 1, 'two' => 2, 'four' => false],
            ],
            'iterator'        => [
                'actual'   => new ArrayIterator(['one' => 1, 'two' => 2, 'three' => null]),
                'expected' => ['one' => 1, 'two' => 2],
            ],
        ];
    }
}
