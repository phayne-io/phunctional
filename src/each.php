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
 * Apply a $fn to all the items of the $coll
 *
 * Similar to `array_walk` but allowing generators too.
 * Function $fn should accept the value of the item as the first argument
 * and optionally the key of the item as the second argument.
 *
 * @param callable $fn   function to apply to every item in the collection
 * @param iterable $coll collection of values to apply the function
 */
function each(callable $fn, iterable $coll): void
{
    foreach ($coll as $key => $value) {
        $fn($value, $key);
    }
}

const each = __NAMESPACE__ . '\\each'; //phpcs:ignore