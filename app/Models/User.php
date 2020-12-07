<?php

namespace App\Models;

class User
{
    private string $name;
    private ?int $id;

    public function __construct(string $name, int $id = null)
    {

        $this->name = $name;
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}