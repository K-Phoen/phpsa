<?php

namespace Tests\Analyze\Fixtures\Statement;

class YodaCondition
{
    public function testYodaIf()
    {
        $a = 2;
        if (1 == $a) {
            return true;
        } elseif (2 != $a) {
            return false;
        } elseif (3 === $a) {
            return false;
        } elseif (4 !== $a) {
            return false;
        }
    }

    public function testYodaLoops()
    {
        $a = 1;
        while (2 == $a) {
            echo $a;
        }

        do {
            echo $a;
        } while (2 == $a);

        for (; 2 == $a;) {
            echo $a;
        }
    }

    public function testYodaSwitch()
    {
        $x = 2;
        switch (true) {
            case (1 == $x):
                break;
            case (2 == $x):
                break;
        }
    }

    public function testNotYodaIf()
    {
        $a = 1;
        if ($a == 1) {
            return true;
        } elseif ($a == 3) {
            return false;
        }
    }

    public function testNotYodaLoops()
    {
        $a = 1;
        while ($a == 2) {
            echo $a;
        }

        do {
            echo $a;
        } while ($a == 2);
    }

    public function testNotYodaSwitch()
    {
        $x = 2;
        switch (true) {
            case ($x == 1):
                break;
        }
    }
}

?>
----------------------------
[
    {
        "type": "yoda_condition",
        "message": "Avoid Yoda conditions, where constants are placed first in comparisons",
        "file": "YodaCondition.php",
        "line": 10
    },
    {
        "type": "yoda_condition",
        "message": "Avoid Yoda conditions, where constants are placed first in comparisons",
        "file": "YodaCondition.php",
        "line": 12
    },
    {
        "type": "yoda_condition",
        "message": "Avoid Yoda conditions, where constants are placed first in comparisons",
        "file": "YodaCondition.php",
        "line": 14
    },
    {
        "type": "yoda_condition",
        "message": "Avoid Yoda conditions, where constants are placed first in comparisons",
        "file": "YodaCondition.php",
        "line": 16
    },
    {
        "type": "yoda_condition",
        "message": "Avoid Yoda conditions, where constants are placed first in comparisons",
        "file": "YodaCondition.php",
        "line": 24
    },
    {
        "type": "yoda_condition",
        "message": "Avoid Yoda conditions, where constants are placed first in comparisons",
        "file": "YodaCondition.php",
        "line": 28
    },
    {
        "type": "yoda_condition",
        "message": "Avoid Yoda conditions, where constants are placed first in comparisons",
        "file": "YodaCondition.php",
        "line": 32
    },
    {
        "type": "yoda_condition",
        "message": "Avoid Yoda conditions, where constants are placed first in comparisons",
        "file": "YodaCondition.php",
        "line": 41
    },
    {
        "type": "yoda_condition",
        "message": "Avoid Yoda conditions, where constants are placed first in comparisons",
        "file": "YodaCondition.php",
        "line": 43
    }
]
