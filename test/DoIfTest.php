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

use function Phayne\Phunctional\apply;
use function Phayne\Phunctional\do_if;

/**
 * Class DoIfTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class DoIfTest extends TestCase
{
    public function testShouldCallTheFnIfPredicatesAreTrue(): void
    {
        $this->assertEquals(5, apply(do_if($this->sumOne(), [$this->isEven()]), [4]));
    }

    public function testShouldReturnNullIfAllPredicatesAreNotTrue(): void
    {
        $this->assertNull(apply(do_if($this->sumOne(), [$this->isGreaterThanOne(), $this->isEven()]), [3]));
    }

    private function sumOne(): callable
    {
        return static function ($num) {
            return $num + 1;
        };
    }

    private function isEven(): callable
    {
        return static function ($num) {
            return $num % 2 === 0;
        };
    }

    private function isGreaterThanOne(): callable
    {
        return static function ($num) {
            return $num > 1;
        };
    }
}
