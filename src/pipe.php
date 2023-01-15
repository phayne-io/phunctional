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
 * Takes a set of functions and returns a new one that is the composition of those `$fns`.
 * The result from the first function execution is piped in to the second function and so on.
 *
 * @param callable ...$fns functions to be piped
 * @return callable
 */
function pipe(callable ...$fns): callable
{
    $compose = static function ($composition, $fn) {
        return static function (...$args) use ($composition, $fn) {
            return null === $composition
                ? $fn(...$args)
                : $fn($composition(...$args));
        };
    };

    return reduce($compose, $fns);
}

const pipe = __NAMESPACE__ . '\\pipe'; //phpcs:ignore
