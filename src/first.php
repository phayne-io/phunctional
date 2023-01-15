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
 * Returns the first element of a collection
 *
 * If the collection is empty returns null
 *
 * @param iterable $coll collection of values
 * @return mixed|null
 */
function first(iterable $coll): mixed
{
    foreach ($coll as $item) {
        return $item;
    }

    return null;
}

const first = __NAMESPACE__ . '\\first'; //phpcs:ignore