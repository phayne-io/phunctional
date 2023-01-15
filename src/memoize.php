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

use Closure;

/**
 * @param callable|null $fn      function to be executed. Pass null to reset cache
 * @param mixed         ...$args arguments to be passed to the called function
 * @return mixed
 */
function memoize(?callable $fn, ...$args): mixed
{
    static $cache = [];

    if (null === $fn) {
        $cache = [];

        return null;
    }

    $keyFn = $fn instanceof Closure ? spl_object_hash($fn) : get_class($fn);
    $key   = md5($keyFn . serialize($args));

    return $cache[$key] = array_key_exists($key, $cache) ? $cache[$key] : $fn(...$args);
}

const memoize = __NAMESPACE__ . '\\memoize'; //phpcs:ignore