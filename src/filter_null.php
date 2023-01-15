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
 * Returns an array with the items in $coll which are not null.
 *
 * @param iterable $coll collection of values to be filtered
 * @return array
 */
function filter_null(iterable $coll): array
{
    return filter(
        not(
            static function ($value) {
                return null === $value;
            }
        ),
        $coll
    );
}

const filter_null = __NAMESPACE__ . '\\filter_null'; //phpcs:ignore
