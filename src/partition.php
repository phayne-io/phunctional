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
 * Partition an array into arrays with size elements preserving its keys. The last portion may contain less than size
 * elements.
 *
 * @param int      $size
 * @param iterable $coll
 * @return array
 */
function partition(int $size, iterable $coll): array
{
    return array_chunk(to_array($coll), $size, true);
}

const partition = __NAMESPACE__ . '\\partition'; //phpcs:ignore
