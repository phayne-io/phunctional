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
 * Search a value in a collection. Return the first occurrence if found, null if not.
 *
 * @param callable $fn      searcher
 * @param iterable $coll    collection of values to be searched
 * @param mixed    $default value to return if no result is found
 * @return mixed|null
 */
function search(callable $fn, iterable $coll, mixed $default = null): mixed
{
    foreach ($coll as $key => $value) {
        if ($fn($value, $key)) {
            return $value;
        }
    }

    return $default;
}

const search = __NAMESPACE__ . '\\search'; //phpcs:ignore
