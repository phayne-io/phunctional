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
 * Returns the value of an item in a $coll or a $default value in the case it does not exist
 *
 * @param string|int $key     key to search in the collection
 * @param iterable   $coll    collection where search the desired value
 * @param mixed|null $default default value to be returned if the key is not found in the collection
 * @return mixed|null
 */
function get(string | int $key, iterable $coll, mixed $default = null): mixed
{
    return is_array($coll) ? _get_array($key, $coll, $default) : _get_traversable($key, $coll, $default);
}

function _get_array(string | int $key, array $coll, mixed $default): mixed
{
    return array_key_exists($key, $coll) ? $coll[$key] : $default;
}

function _get_traversable(string | int $key, iterable $coll, mixed $default): mixed
{
    foreach ($coll as $k => $v) {
        if ($key == $k) {
            return $v;
        }
    }

    return $default;
}

const get = __NAMESPACE__ . '\\get'; //phpcs:ignore