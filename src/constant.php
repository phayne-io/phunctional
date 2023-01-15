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
 * It wraps a value into a Closure, which return the same value whenever is called
 *
 * @param mixed $value any type of value
 * @return callable
 */
function constant(mixed $value): callable
{
    return static function () use ($value) {
        return $value;
    };
}

const constant = __NAMESPACE__ . '\\constant'; //phpcs:ignore
