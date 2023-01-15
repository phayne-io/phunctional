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
 * Sorts a collection
 *
 * @param callable $fn   comparator function which receives two elements of the collection and must return an
 *                       integer less than, equal to, or greater than zero if the first argument is considered
 *                       to be respectively less than, equal to, or greater than the second
 * @param iterable $coll collection to order
 * @return array
 */
function sort(callable $fn, iterable $coll): array
{
    $sorted = to_array($coll);

    usort($sorted, $fn);

    return $sorted;
}

const sort = __NAMESPACE__ . '\\sort'; //phpcs:ignore