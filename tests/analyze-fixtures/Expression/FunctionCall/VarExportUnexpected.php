<?php

namespace Tests\Analyze\Fixtures\Expression\FunctionCall;

class VarExportUnexpected
{
    /**
     * @return string
     */
    public function testVarExportSuccess()
    {
        return "test " . var_export(1, true);
    }

    /**
     * @return string
     */
    public function testVarExportUnexpected()
    {
        /**
         * Second parameter in var_export must be true
         */
        $a = "test " . var_export(1);
        return $a;
    }

    /**
     * @return string
     */
    public function testVarExportUnexpectedWithReturn()
    {
        return var_export(1);
    }
}
?>
----------------------------
[
    {
        "type":"debug.code",
        "message":"Function var_export() is a debug function, please don`t use it in production.",
        "file":"VarExportUnexpected.php",
        "line":12
    },
    {
        "type":"debug.code",
        "message":"Function var_export() is a debug function, please don`t use it in production.",
        "file":"VarExportUnexpected.php",
        "line":23
    },
    {
        "type":"debug.code",
        "message":"Function var_export() is a debug function, please don`t use it in production.",
        "file":"VarExportUnexpected.php",
        "line":32
    }
]
