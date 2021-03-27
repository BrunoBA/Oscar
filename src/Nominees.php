<?php

namespace Oscar;

class Nominees
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
}
