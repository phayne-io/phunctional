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
 * Fix a number of arguments to a function producing another one with an smaller arity
 *
 * @param callable $fn      function to be biased
 * @param mixed    ...$args arguments to fix in the function
 * @return callable
 */
function partial(callable $fn, ...$args): callable
{
    return static function (...$biasedArgs) use ($fn, $args) {
        return $fn(...array_merge($args, $biasedArgs));
    };
}

const partial = __NAMESPACE__ . '\\partial'; //phpcs:ignore
