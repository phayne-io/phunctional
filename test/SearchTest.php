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

use PHPUnit\Framework\TestCase;

use function Phayne\Phunctional\search;

/**
 * Class SearchTest
 *
 * @package Phayne\Phunctional\Tests
 * @author Julien Guittard <julien.guittard@me.com>
 */
class SearchTest extends TestCase
{
    public function testShouldSearchAnExistentValue(): void
    {
        $amsterdam  = [
            'name'     => 'Amsterdam',
            'color'    => 'Black',
            'cool'     => true,
            'original' => false,
        ];
        $elephpant  = [
            'name'     => 'ElePHPant',
            'color'    => 'Blue',
            'cool'     => false,
            'original' => true,
        ];
        $laraphpant = [
            'name'     => 'LaraPHPant',
            'color'    => 'Red',
            'cool'     => true,
            'original' => false,
        ];

        $elephpants = [$amsterdam, $elephpant, $laraphpant];

        $this->assertEquals($elephpant, search($this->originalSearcher(), $elephpants));
    }

    public function testShouldReturnTheDefaultValueIfNoResultIsFound(): void
    {
        $numbers = [1, 2, 3, 4, 5];

        $this->assertEquals('No result found', search($this->aNumberBiggerTanTen(), $numbers, 'No result found'));
    }

    private function originalSearcher(): callable
    {
        return static function (array $elephpant) {
            return $elephpant['original'];
        };
    }

    private function aNumberBiggerTanTen(): callable
    {
        return static function ($num) {
            return $num > 10;
        };
    }
}
