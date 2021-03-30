<?php

namespace Oscar;

use JsonSerializable;

class Oscar implements JsonSerializable
{
    /** @var ?Category[] */
    private $categories = null;

    public function __construct()
    {
        $this->initializeNominees();
    }

    private function initializeNominees()
    {
        $oscar2021 = loadNomineesFromJson();
        foreach ($oscar2021 as $category) {
            $objectCategory = new Category(id: $category->id, name: $category->name);
            $this->loadNominees($objectCategory, $category->nominated);

            $this->categories[] = $objectCategory;
        };
    }

    private function loadNominees(Category &$category, array $nominees)
    {
        foreach ($nominees as $nominee) {
            $category->addNominees($nominee);
        }
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function jsonSerialize(): array
    {
        return [
            'categories' => $this->categories,
        ];
    }

    public function toJson(): string
    {
        return json_encode($this);
    }

    public function toArray(): array
    {
        return json_decode($this->toJson(), true);
    }

}
