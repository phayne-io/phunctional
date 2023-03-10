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
 * Returns all the elements of a collection except the first preserving the keys
 *
 * If the collection is empty or only have one item, returns an empty collection
 *
 * @param iterable $coll collection of values
 * @return array
 */
function rest(iterable $coll): array
{
    $firstItem = true;
    $rest      = [];

    foreach ($coll as $key => $value) {
        $firstItem
            ? $firstItem = false
            : $rest[$key] = $value;
    }

    return $rest;
}

const rest = __NAMESPACE__ . '\\rest'; //phpcs:ignore
