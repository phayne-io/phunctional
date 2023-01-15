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
 * Returns an array containing the results of applying $fn to the items of the $coll
 *
 * Similar to `array_map` but accepting Traversable.
 * Function $fn should accept the value of the item as the first argument and optionally the key of the
 * item as the second argument.
 *
 * @param callable $fn   function to apply to every item in the collection
 * @param iterable $coll collection of values to apply the function
 * @return array
 */
function map(callable $fn, iterable $coll): array
{
    try {
        return ___map_indexed($fn, $coll);
    } catch (ArgumentCountError) {
        return array_map($fn, to_array($coll));
    }
}

function ___map_indexed(callable $fn, iterable $coll): array
{
    $result = [];

    foreach ($coll as $key => $value) {
        $result[$key] = $fn($value, $key);
    }

    return $result;
}

const map = __NAMESPACE__ . '\\map'; //phpcs:ignore
