<?php

declare(strict_types=1);

/*
 * This file is part of Alzura.
 *
 * (c) Saitow AG <https://www.saitow.ag>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Form;


class Data
{
    /**
     * @var string
     */
    protected $test;

    /**
     * @var array<Platform>
     */
    protected $platforms;

    /**
     * @return array<Platform>
     */
    public function getPlatforms()
    {
        return $this->platforms;
    }

    public function addPlatform(Platform $platform): void
    {
        $this->platforms[$platform->getId()] = $platform;
    }

    public function removePlatform(Platform $platform): void
    {
        if (\array_key_exists($platform->getId(), $this->platforms)) {
            unset($this->platforms[$platform->getId()]);
        }
    }

    /**
     * @return string
     */
    public function getTest(): string
    {
        return $this->test;
    }

    /**
     * @param string $test
     */
    public function setTest(string $test): void
    {
        $this->test = $test;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();

        $self->test = $data['test'];
        foreach ($data['platforms'] ?? [] as $platform) {
            $self->addPlatform(Platform::fromArray($platform));
        }

        return $self;
    }
}
