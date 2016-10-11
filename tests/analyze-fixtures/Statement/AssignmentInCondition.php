<?php

namespace Tests\Analyze\Fixtures\Statement;

class AssignmentCondition
{
    public function testAssignmentIf()
    {
        $a = 2;
        if ($a = 1) {
            return true;
        } elseif ($a = 2) {
            return false;
        } elseif ($a = 3) {
            return false;
        }
    }

    public function testAssignmentLoops()
    {
        $a = 1;
        while ($a = 2) {
            echo $a;
        }

        do {
            echo $a;
        } while ($a = 2);

        for (;$a = 2;) {
            echo $a;
        }
    }

    public function testAssignmentSwitch()
    {
        $x = 2;
        switch (true) {
            case ($x = 1):
                break;
            case ($x = 2):
                break;
        }
    }

    public function testNoAssignmentIf()
    {
        $a = 1;
        if ($a == 1) {
            return true;
        } elseif ($a == 3) {
            return false;
        }
    }

    public function testNoAssignmentLoops()
    {
        $a = 1;
        while ($a == 2) {
            echo $a;
        }

        do {
            echo $a;
        } while ($a == 2);
    }

    public function testNoAssignmentSwitch()
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
        "type": "assignment_in_condition",
        "message": "An assignment statement has been made instead of conditional statement",
        "file": "AssignmentInCondition.php",
        "line": 10
    },
    {
        "type": "assignment_in_condition",
        "message": "An assignment statement has been made instead of conditional statement",
        "file": "AssignmentInCondition.php",
        "line": 12
    },
    {
        "type": "assignment_in_condition",
        "message": "An assignment statement has been made instead of conditional statement",
        "file": "AssignmentInCondition.php",
        "line": 14
    },
    {
        "type": "assignment_in_condition",
        "message": "An assignment statement has been made instead of conditional statement",
        "file": "AssignmentInCondition.php",
        "line": 22
    },
    {
        "type": "assignment_in_condition",
        "message": "An assignment statement has been made instead of conditional statement",
        "file": "AssignmentInCondition.php",
        "line": 26
    },
    {
        "type": "assignment_in_condition",
        "message": "An assignment statement has been made instead of conditional statement",
        "file": "AssignmentInCondition.php",
        "line": 30
    },
    {
        "type": "assignment_in_condition",
        "message": "An assignment statement has been made instead of conditional statement",
        "file": "AssignmentInCondition.php",
        "line": 39
    },
    {
        "type": "assignment_in_condition",
        "message": "An assignment statement has been made instead of conditional statement",
        "file": "AssignmentInCondition.php",
        "line": 41
    }
]
