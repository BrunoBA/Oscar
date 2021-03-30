<?php

namespace Oscar\Tests;

use Oscar\Nominees;
use Oscar\Oscar;
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

    /** @test */
    public function canParseToJson()
    {
        $oscarJson = (new Oscar())->toJson();

        $oscar = json_decode($oscarJson);
        $this->assertEquals(true, is_string($oscarJson));
        $this->assertEquals(true, is_array($oscar->categories));
    }

    /** @test */
    public function canParseToArray()
    {
        $oscarArray = (new Oscar())->toArray();
        $this->assertEquals(true, is_array($oscarArray));
    }
}
