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

/**
 * Returns an array with the items grouped by the results of applying $fn to each item.
 *
 * Function $fn should accept the value of the item as the first argument.
 *
 * @param callable $fn   function to apply to every item in the collection
 * @param iterable $coll collection of values to apply the function
 * @return array
 */
function group_by(callable $fn, iterable $coll): array
{
    $result = [];

    foreach ($coll as $item) {
        $result[$fn($item)][] = $item;
    }

    return $result;
}

const group_by = __NAMESPACE__ . '\\group_by'; //phpcs:ignore