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
 * Calls $fn with $args and returns its results.
 *
 * This function tries to solve the problem of calling a function stored in a class attribute, because if you try
 * `$this->callable($arg1, $arg2)` PHP expects `$this->callable` to be a function and not a property. And to avoid
 * use the magic method _invoke_ that will properly work `$this->callable->__invoke($arg1, $arg2)` we use go with
 * `apply($this->callable, [$arg1, $arg2])`.
 *
 * Be aware that using this function most IDEs will lose the path, so they will not detect that you are passing the
 * wrong number of parameters or will not do as you expect a change of signature. To have a good test suite would be a
 * requirement for a wide use of this function in your code.
 *
 * @param callable $fn   function to be executed
 * @param iterable $args arguments to be passed to the called function
 * @return mixed
 */
function apply(callable $fn, iterable $args = []): mixed
{
    return $fn(...to_array($args));
}

const apply = __NAMESPACE__ . '\\apply'; //phpcs:ignore
