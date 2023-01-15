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
 * Check if some value of the collection satisfies the function
 * This is an alias for the `some` function
 *
 * @param callable $fn   function to check if the predicate is true
 * @param iterable $coll collection of values to check any is true by the `$fn`
 * @return bool
 */
function any(callable $fn, iterable $coll): bool
{
    return some($fn, $coll);
}

const any = __NAMESPACE__ . '\\any'; //phpcs:ignore
