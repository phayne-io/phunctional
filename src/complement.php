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
 * Returns the opposite of the `$fn` call
 * This is an alias for the `not` function
 *
 * @param callable $fn
 * @return callable
 */
function complement(callable $fn): callable
{
    return not($fn);
}

const complement = __NAMESPACE__ . '\\complement'; //phpcs:ignore
