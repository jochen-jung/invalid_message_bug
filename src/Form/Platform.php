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

class Platform
{
    /** @var int */
    private $id;

    /** @var string */
    private $key;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key): void
    {
        $this->key = $key;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();

        $self->id = (int) $data['id'];
        $self->key = $data['key'];

        return $self;
    }
}
