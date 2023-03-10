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
 * Takes a set of functions and returns another that is the composition of those `$fns`.
 * The result from the first function execution is used in the second function, etc.
 *
 * @param callable ...$fns functions to be composed
 * @return callable
 */
function compose(callable ...$fns): callable
{
    return pipe(...reverse($fns));
}

const compose = __NAMESPACE__ . '\\compose'; //phpcs:ignore
