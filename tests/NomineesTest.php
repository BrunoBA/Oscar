<?php

namespace Oscar\Tests;

use Oscar\Nominees;
use PHPUnit\Framework\TestCase;

class NomineesTest extends TestCase
{
    private Nominees $nominees;

    protected function setUp(): void
    {
        $this->nominees = new Nominees();
    }

    /** @test */
    public function emptyNomineesShouldHaveSizeZero()
    {
        $this->assertEquals(0, $this->nominees->count());
    }

    /** @test */
    public function preventDuplicatedNominees()
    {
        $nomineeName = "Dummy Movie";

        $this->nominees->addNominee($nomineeName);
        $this->nominees->addNominee($nomineeName);

        $this->assertEquals(1, $this->nominees->count());
    }
}
