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
 * Returns a reversed $coll preserving its keys.
 *
 * Passing a Generator to this function will work but it does not provide any improvement against a simple Traversable
 * because to reach the last one is necessary iterate among all the items
 *
 * @param iterable $coll collection to be reversed
 * @return array
 */
function reverse(iterable $coll): array
{
    return array_reverse(to_array($coll), true);
}

const reverse = __NAMESPACE__ . '\\reverse'; //phpcs:ignore
