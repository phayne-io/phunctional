<?php

/**
 * This file is part of phayne-io/phunctional and is proprietary and confidential.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 *
 * @see       https://github.com/phayne-io/phunctional for the canonical source repository
 * @copyright Copyright (c) 2023-2023 Phayne. (https://phayne.io)
 */

declare(strict_types=1);

namespace Phayne\Phunctional;

use ArgumentCountError;

/**
 * Returns an array with the items in $coll for which $fn returns true.
 *
 * Similar to `array_filter` but with a consistent parameters order, requiring always a function and allowing access
 * to the keys of the collection.
 *
 * @param callable $fn   function to filter by
 * @param iterable $coll collection of values to be filtered
 * @return array
 */
function filter(callable $fn, iterable $coll): array
{
    $args = to_array($coll);

    try {
        return array_filter($args, $fn, ARRAY_FILTER_USE_BOTH);
    } catch (ArgumentCountError) {
        return array_filter($args, $fn);
    }
}

const filter = __NAMESPACE__ . '\\filter'; //phpcs:ignore
