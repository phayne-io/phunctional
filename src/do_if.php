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
 * Returns a callable that will call the given function if the result of applying
 * the callable arguments to the predicates is true for all of them.
 *
 * @param callable   $fn         Function to call if all predicates are valid.
 * @param callable[] $predicates Predicates to validate.
 * @return callable
 */
function do_if(callable $fn, iterable $predicates): callable
{
    return static function (...$args) use ($fn, $predicates) {
        $isValid = static function ($predicate) use ($args) {
            return $predicate(...$args);
        };

        return all($isValid, $predicates) ? $fn(...$args) : null;
    };
}

const do_if = __NAMESPACE__ . '\\do_if'; //phpcs:ignore
