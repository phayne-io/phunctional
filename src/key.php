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
 * Returns the key of an item in a $coll or a $default value in the case it does not exists
 *
 * @param mixed      $value   value to search in the collection
 * @param iterable   $coll    collection where search the desired key
 * @param mixed|null $default default value to be returned if the value is not found in the collection
 * @return mixed|null
 */
function key(mixed $value, iterable $coll, mixed $default = null): mixed
{
    $key = array_search($value, to_array($coll), true);

    return false !== $key ? $key : $default;
}

const key = __NAMESPACE__ . '\\key'; //phpcs:ignore