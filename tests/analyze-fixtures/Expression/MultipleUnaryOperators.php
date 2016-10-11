<?php

namespace Tests\Analyze\Fixtures\Expression;

class MultipleUnaryOperators
{
    public function doubleBooleanNot()
    {
        if (!!true) {
            return 1;
        }
    }

    public function doubleBitwiseNot()
    {
        if (~~1) {
            return 1;
        }
    }

    public function doubleUnaryMinus()
    {
        if (- -1) {
            return 1;
        }
    }

    public function doubleUnaryPlus()
    {
        if (+ +1) {
            return 1;
        }
    }

    public function singleBooleanNot()
    {
        if (!true) {
            return 1;
        }
    }

    public function singleBitwiseNot()
    {
        if (~1) {
            return 1;
        }
    }

    public function preDec()
    {
        $a = 1;
        if (--$a) {
            return 1;
        }
    }

    public function preInc()
    {
        $a = 1;
        if (++$a) {
            return 1;
        }
    }

}
?>
----------------------------
[
    {
        "type":"multiple_unary_operators",
        "message":"You are using multiple unary operators. This has no effect",
        "file":"MultipleUnaryOperators.php",
        "line":9
    },
    {
        "type":"multiple_unary_operators",
        "message":"You are using multiple unary operators. This has no effect",
        "file":"MultipleUnaryOperators.php",
        "line":16
    },
    {
        "type":"multiple_unary_operators",
        "message":"You are using multiple unary operators. This has no effect",
        "file":"MultipleUnaryOperators.php",
        "line":23
    },
    {
        "type":"multiple_unary_operators",
        "message":"You are using multiple unary operators. This has no effect",
        "file":"MultipleUnaryOperators.php",
        "line":30
    }
]
