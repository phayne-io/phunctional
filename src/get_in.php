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
 * Returns the value in a nested associative structure or a $default value in the case it does not exist
 *
 * @param array      $keys     Keys of the value to be returned
 * @param array      $elements Elements to search in
 * @param mixed|null $default  Value to be returned if the key does not exist
 * @return mixed|null
 */

function get_in(array $keys, array $elements, mixed $default = null): mixed
{
    $current = $elements;

    foreach ($keys as $key) {
        if (!array_key_exists($key, $current)) {
            return $default;
        }

        $current = $current[$key];
    }

    return $current;
}

const get_in = __NAMESPACE__ . '\\get_in'; //phpcs:ignore