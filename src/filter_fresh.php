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
 * Returns an array with the items in $coll for which $fn returns true.
 *
 * Similar to `array_filter` but with a consistent parameters order, requiring always a function, and
 * returning a new array with keys that start at 0.
 *
 * @param callable $fn   function to filter by
 * @param iterable $coll collection of values to be filtered
 * @return array
 */
function filter_fresh(callable $fn, iterable $coll): array
{
    return array_values(filter($fn, $coll));
}

const filter_fresh = __NAMESPACE__ . '\\filter_fresh'; //phpcs:ignore