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

use function is_iterable;

/**
 * Returns a flat array of a multidimensional $coll
 *
 * @param iterable $coll collection of multidimensional values to be flattened
 * @return array
 */
function flatten(iterable $coll): array
{
    $result = [];

    foreach ($coll as $value) {
        if (is_iterable($value)) {
            foreach (flatten($value) as $v) {
                $result[] = $v;
            }
        } else {
            $result[] = $value;
        }
    }

    return $result;
}

const flatten = __NAMESPACE__ . '\\flatten'; //phpcs:ignore
