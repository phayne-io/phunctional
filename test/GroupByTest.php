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

use function Phayne\Phunctional\group_by;

/**
 * Class GroupByTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class GroupByTest extends TestCase
{
    public function testShouldGroupACollection(): void
    {
        $coll    = ['one', 'two', 'three'];
        $grouped = [3 => ['one', 'two'], 5 => ['three']];

        $this->assertSame($grouped, group_by('strlen', $coll));
    }
}
