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
 * Check if all the values of the collection satisfies the function
 *
 * @param callable $fn   function to check if the predicate is true
 * @param iterable $coll collection of values to check all are true by the `$fn`
 * @return bool
 */
function all(callable $fn, iterable $coll): bool
{
    return ! some(not($fn), $coll);
}

const all = __NAMESPACE__ . '\\all'; //phpcs:ignore
