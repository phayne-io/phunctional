<?php

/**
 * This file is part of phayne-io/phunctional and is proprietary and confidential.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 *
 * @see       https://github.com/phayne-io/phunctional for the canonical source repository
 * @copyright Copyright (c) 2023-2023 Phayne. (https://phayne.io)
 */

declare(strict_types=1);

namespace Phayne\Phunctional\Tests;

use ArrayIterator;
use PHPUnit\Framework\TestCase;

use function Phayne\Phunctional\apply;

/**
 * Class ApplyTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class ApplyTest extends TestCase
{
    public function testShouldCallReturnTheValueOfTheCalledFunction(): void
    {
        $this->assertSame('function without arguments', apply($this->functionWithoutArguments()));
    }

    /**
     * @dataProvider arguments
     */
    public function testShouldCallProperlyAFunctionWithSomeArguments($arguments): void
    {
        $this->assertSame('Hello functional, welcome to PHP!!', apply($this->functionWithArguments(), $arguments));
    }

    public function arguments(): array
    {
        return [
            'array'     => ['arguments' => ['PHP', 'functional']],
            'iterator'  => ['arguments' => new ArrayIterator(['PHP', 'functional'])],
            'generator' => ['arguments' => $this->generator('PHP', 'functional')],
        ];
    }

    private function functionWithoutArguments(): callable
    {
        return static function (): string {
            return 'function without arguments';
        };
    }

    private function functionWithArguments(): callable
    {
        return static function ($context, $name): string {
            return sprintf('Hello %s, welcome to %s!!', $name, $context);
        };
    }

    private function generator(...$items)
    {
        return apply(
            static function () use ($items) {
                foreach ($items as $item) {
                    yield $item;
                }
            }
        );
    }
}
