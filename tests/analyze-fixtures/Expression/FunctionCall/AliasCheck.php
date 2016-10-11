<?php

namespace Tests\Analyze\Fixtures\Expression\FunctionCall;

class AliasCheck
{
    /**
     * @return bool
     */
    public function testJoin()
    {
        return join('-', [1, 2]);
    }

    /**
    * @return integer
    */
    public function testSizeOf()
    {
        return sizeof([1, 2]);
    }
}

?>
----------------------------
[
    {
        "type": "fcall.alias",
        "message": "join() is an alias of another function. Use implode() instead.",
        "file": "AliasCheck.php",
        "line": 12
    },
    {
        "type": "fcall.alias",
        "message": "sizeof() is an alias of another function. Use count() instead.",
        "file": "AliasCheck.php",
        "line": 20
    }
]
