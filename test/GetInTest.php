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

namespace Phayne\Phunctional\Tests;

use PHPUnit\Framework\TestCase;

use function Phayne\Phunctional\get_in;

/**
 * Class GetInTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class GetInTest extends TestCase
{
    public function testShouldReturnTheValueOfTheItemOfAnExistentKey(): void
    {
        $user = [
            'username' => 'Peter',
            'profile'  => ['name' => 'Peter', 'surname' => 'Quinn', 'email' => 'peterquinn@fakeemail.com'],
        ];

        $this->assertSame('peterquinn@fakeemail.com', get_in(['profile', 'email'], $user));
    }

    public function testShouldReturnNullIfTheKeyDoesNotExistsAndNotDefaultValueIsProvided(): void
    {
        $user = [
            'username' => 'Peter',
            'profile'  => ['name' => 'Peter', 'surname' => 'Quinn', 'email' => 'peterquinn@fakeemail.com'],
        ];

        $this->assertNull(get_in(['password'], $user));
    }

    public function testShouldReturnTheDefaultValueProvidedIfTheKeyDoesNotExists(): void
    {
        $user = [
            'username' => 'Peter',
            'profile'  => ['name' => 'Peter', 'surname' => 'Quinn', 'email' => 'peterquinn@fakeemail.com'],
        ];

        $this->assertSame('fakepass', get_in(['password'], $user, 'fakepass'));
    }
}
