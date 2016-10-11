<?php

namespace Tests\Analyze\Fixtures\Statement;

class MethodCannotReturn
{
    public function __construct()
    {
        return 1;
    }

    public function __destruct()
    {
        return 1;
    }
}

class TestNoReturn
{
	public $a;

	public function __construct()
	{
		$a = 1;
	}

	public function __destruct()
	{
		$a = 0;
	}
}

?>
----------------------------
[
    {
        "type":"return.construct",
        "message":"Method __construct cannot return a value.",
        "file":"MethodCannotReturn.php",
        "line":9
    },
    {
        "type":"return.construct",
        "message":"Method __destruct cannot return a value.",
        "file":"MethodCannotReturn.php",
        "line":14
    }
]
