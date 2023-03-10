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

namespace Phayne\Phunctional;

/**
 * Returns the opposite of the `$fn` call
 *
 * @param callable $fn
 * @return callable
 */
function not(callable $fn): callable
{
    return static function (...$args) use ($fn) {
        return ! $fn(...$args);
    };
}

const not = __NAMESPACE__ . '\\not'; //phpcs:ignore
