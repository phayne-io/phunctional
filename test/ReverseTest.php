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

use function Phayne\Phunctional\reverse;

/**
 * Class ReverseTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class ReverseTest extends TestCase
{
    public function testShouldReverseAnArrayPreservingTheKeys(): void
    {
        $coll = [1, 2, 3, 4, 5];

        $this->assertSame([4 => 5, 3 => 4, 2 => 3, 1 => 2, 0 => 1], reverse($coll));
    }

    public function testShouldReverseATraversable(): void
    {
        $coll = new ArrayIterator([1, 2, 3, 4, 5]);

        $this->assertSame([4 => 5, 3 => 4, 2 => 3, 1 => 2, 0 => 1], reverse($coll));
    }
}
