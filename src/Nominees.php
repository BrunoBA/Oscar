<?php

namespace Oscar;

use JsonSerializable;

class Nominees implements JsonSerializable
{
    public function __construct(
        private array $nominees = []
    ) {
    }

    public function addNominee(string $name): void
    {
        if (!in_array($name, $this->nominees)) {
            $this->nominees[] = $name;
        }
    }

    public function getNominees(): array
    {
        return $this->nominees;
    }

    public function count(): int
    {
        return count($this->nominees);
    }

    public function jsonSerialize(): array
    {
        return $this->nominees;
    }
}
