<?php

namespace Oscar;

use JsonSerializable;

class Category implements JsonSerializable
{
    private int | null $winner = null;
    private Nominees $nominees;

    public function __construct(
        private string $name,
        private int $id = 0
    ) {
        $this->nominees = new Nominees();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getWinner(): ?int
    {
        return $this->winner;
    }

    public function setWinner(int $winner): void
    {
        $quantityOfNominees = $this->nominees->count();

        if ($quantityOfNominees === 0 || is_null($winner)) {
            return;
        }

        if ($winner > $quantityOfNominees - 1) {
            return;
        }

        $this->winner = $winner;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNominees(): array
    {
        return $this->nominees->getNominees();
    }

    public function addNominees(string $nominated): void
    {
        $this->nominees->addNominee($nominated);
    }

    public function jsonSerialize(): array
    {
        return [
            'winner' => $this->winner,
            'nominees' => $this->nominees,
            'name' => $this->name,
            'id' => $this->id,
        ];
    }
}
