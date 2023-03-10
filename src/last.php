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
 * Returns the last element of a collection
 *
 * If the collection is empty returns null. If a generator is passed this will be iterated.
 *
 * @param iterable $coll collection of values
 * @return mixed|null
 * @since 0.1
 */
function last(iterable $coll): mixed
{
    return first(reverse($coll));
}

const last = __NAMESPACE__ . '\\last'; //phpcs:ignore