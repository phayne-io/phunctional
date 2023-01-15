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

use function Phayne\Phunctional\filter_fresh;

/**
 * Class FilterFreshTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class FilterFreshTest extends TestCase
{
    public function testShouldFilterACollectionUpdatingTheIndexes(): void
    {
        $actual = [0 => 'green', 1 => 'red', 2 => 'yellow', 3 => 'orange', 4 => 'blue'];
        $pred   = $this->primaryColorFilterer();

        $this->assertSame([0 => 'red', 1 => 'yellow', 2 => 'blue'], filter_fresh($pred, $actual));
    }

    public function testShouldFilterACollectionUpdatingTheirKeys(): void
    {
        $actual = [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5];
        $pred   = $this->evenByValueFilterer();

        $this->assertSame([0 => 2, 1 => 4], filter_fresh($pred, $actual));
    }

    private function primaryColorFilterer(): callable
    {
        return static function ($color) {
            return in_array($color, ['red', 'yellow', 'blue']);
        };
    }

    private function evenByValueFilterer(): callable
    {
        return static function ($number) {
            return 0 === $number % 2;
        };
    }
}
