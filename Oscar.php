<?php


use Oscar\Category;

class Oscar implements \JsonSerializable
{
    /** @var ?Category[] */
    private $categories = null;

    public function __construct()
    {
        $this->initializeNominees();
    }

    private function initializeNominees()
    {
        $oscar2021 = loadNominees();
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

    public function jsonSerialize()
    {
        return json_encode($this);
    }
}
