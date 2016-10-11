<?php

namespace Tests\Analyze\Fixtures\Expression\FunctionCall;

class DebugCode
{
    /**
     * @return bool
     */
    public function testVarDumpUnexpected()
    {
        var_dump(1);

        return true;
    }

    /**
     * @return bool
     */
    public function testVarDumpExpected()
    {
        /**
         * @expected
         */
        var_dump(1);

        return true;
    }

    /**
     * @return bool
     */
    public function testVarDumpWithSimpleComment()
    {
        /**
         * Expected
         */
        var_dump(1);

        return true;
    }

    /**
     * @return bool
     */
    public function testVarExportUnexpected()
    {
        var_export(1);

        return true;
    }

    /**
     * @return bool
     */
    public function testVarExportExpected()
    {
        /**
         * @expected
         */
        var_export(1);

        return true;
    }

    /**
     * @return bool
     */
    public function testVarExportWithSimpleComment()
    {
        /**
         * Expected
         */
        var_export(1);

        return true;
    }

    /**
     * @return bool
     */
    public function testDebugZvalDumpUnexpected()
    {
        debug_zval_dump(1);

        return true;
    }

    /**
     * @return bool
     */
    public function testDebugZvalDumpExpected()
    {
        /**
         * @expected
         */
        debug_zval_dump(1);

        return true;
    }

    /**
     * @return bool
     */
    public function testDebugZvalDumpWithSimpleComment()
    {
        /**
         * Expected
         */
        debug_zval_dump(1);

        return true;
    }
}

?>
----------------------------
[
    {
        "type":"debug.code",
        "message":"Function var_dump() is a debug function, please don`t use it in production.",
        "file":"DebugCode.php",
        "line":12
    },
    {
        "type":"debug.code",
        "message":"Function var_dump() is a debug function, please don`t use it in production.",
        "file":"DebugCode.php",
        "line":38
    },
    {
        "type":"debug.code",
        "message":"Function var_export() is a debug function, please don`t use it in production.",
        "file":"DebugCode.php",
        "line":48
    },
    {
        "type":"debug.code",
        "message":"Function var_export() is a debug function, please don`t use it in production.",
        "file":"DebugCode.php",
        "line":74
    },
    {
        "type":"debug.code",
        "message":"Function debug_zval_dump() is a debug function, please don`t use it in production.",
        "file":"DebugCode.php",
        "line":84
    },
    {
        "type":"debug.code",
        "message":"Function debug_zval_dump() is a debug function, please don`t use it in production.",
        "file":"DebugCode.php",
        "line":110
    }
]
