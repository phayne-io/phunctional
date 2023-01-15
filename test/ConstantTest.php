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

use function Phayne\Phunctional\constant;

/**
 * Class ConstantTest
 *
 * @package ${NAMESPACE}
 * @author Julien Guittard <julien.guittard@me.com>
 */
class ConstantTest extends TestCase
{
    public function testShouldReturnAValue(): void
    {
        $value           = 5;
        $constantClosure = constant($value);

        $this->assertSame($value, $constantClosure());
    }

    public function testShouldReturnSameValueIfCalledTwice(): void
    {
        $value           = 5;
        $constantClosure = constant($value);

        $constantClosure();

        $this->assertSame($value, $constantClosure());
    }
}
