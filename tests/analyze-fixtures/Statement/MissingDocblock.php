<?php

namespace Tests\Analyze\Fixtures\Statement;

class MissingDocblock
{
    public $noDocblock = 1;

    const NODOC = 1;

    public function noDocblock()
    {
        return 1;
    }
}

function noDocblockFunc() {
    return 1;
}

trait noDocblockTrait
{

}

//interface noDocblockInterface {} Interface currently not supported

/**
 * Test
 */
class WithDocblock
{
    /**
     * Test
     */
    public $withDocblock = 1;

    /**
     * Test
     */
    const WITHDOC = 1;

    /**
     * Test
     */
    public function withDocblock()
    {
        return 2;
    }
}

/**
 * Test
 */
function withDocblockFunc() {
    return 1;
}

/**
 * Test
 */
trait withDocblockTrait
{

}

//interface withDocblockInterface {} Interface currently not supported
?>
----------------------------
[
    {
        "type":"missing_docblock",
        "message":"Missing Docblock",
        "file":"MissingDocblock.php",
        "line":5
    },
    {
        "type":"missing_docblock",
        "message":"Missing Docblock",
        "file":"MissingDocblock.php",
        "line":7
    },
    {
        "type":"missing_docblock",
        "message":"Missing Docblock",
        "file":"MissingDocblock.php",
        "line":9
    },
    {
        "type":"missing_docblock",
        "message":"Missing Docblock",
        "file":"MissingDocblock.php",
        "line":11
    },
    {
        "type":"missing_docblock",
        "message":"Missing Docblock",
        "file":"MissingDocblock.php",
        "line":17
    },
    {
        "type":"missing_docblock",
        "message":"Missing Docblock",
        "file":"MissingDocblock.php",
        "line":21
    }
]
