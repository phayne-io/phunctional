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

use Traversable;

/**
 * Transform a possible iterator to an array
 *
 * @param iterable $coll collection to transform to array
 * @return array
 */
function to_array(iterable $coll): array
{
    return $coll instanceof Traversable ? iterator_to_array($coll) : $coll;
}

const to_array = __NAMESPACE__ . '\\to_array'; //phpcs:ignore
