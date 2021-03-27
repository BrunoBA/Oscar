<?php

namespace Oscar\Tests;

use Oscar\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{

    private Category $category;

    protected function setUp(): void
    {
        $dummyName = "Dummy Category";
        $this->category = new Category(name: $dummyName);
    }

    /** @test */
    public function aCreatedCategoryMustBeEmptyNominees()
    {
        $this->assertEquals(0, count($this->category->getNominees()));
    }

    /** @test */
    public function aCreatedCategoryMustBeEmptyWinner()
    {
        $this->assertEquals(null, $this->category->getWinner());
    }

    /** @test */
    public function selectWinnerWithoutNomineesIsntAvailable()
    {
        $this->category->setWinner(1);
        $this->assertEquals(null, $this->category->getWinner());
    }

    /** @test */
    public function shouldNotSelectWinnerOutOfRange()
    {
        $nominee = "Dummy Movie";
        $this->category->addNominees($nominee);
        $this->category->setWinner(1);

        $this->assertEquals(null, $this->category->getWinner());
    }

    /** @test */
    public function selectReturnASelectedWinner()
    {
        $winnerIndex = 0;

        $this->category->addNominees("Dummy Movie1");
        $this->category->addNominees("Dummy Movie2");
        $this->category->setWinner($winnerIndex);

        $this->assertEquals(2, count($this->category->getNominees()));
        $this->assertEquals($winnerIndex, $this->category->getWinner());
    }

    /** @test */
    public function preventDuplicatedNominees()
    {
        $nomineeName = "Dummy Movie";

        $this->category->addNominees($nomineeName);
        $this->category->addNominees($nomineeName);

        $this->assertEquals(1, count($this->category->getNominees()));
    }
}
