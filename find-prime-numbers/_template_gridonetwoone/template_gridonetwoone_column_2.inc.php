
<?php

    set_time_limit(180); 

    $size = FUNCTIONS::getQueryString("size", 0);

    if ($size == 4) {
        $query = "select number from prime_int4";

        $list = Data::executeSelectQuery($query);

        $count = sizeof($list);

        $max = $list[$count - 1]["number"];

        while ($max <= pow(2, 8) - 2) {
            $max += 2;

            $isPrime = true;

            foreach ($list as $item) {

                $number = $item["number"];
                if ($max % $number == 0) {
                    $isPrime = false;
                }
            }

            if ($isPrime) {
                $query = "insert into prime_int4 values ($max)";
                Data::executeQuery($query);
            }
        }
    }
    else if ($size == 8) {
        $table = $size / 2;
        $query = "select number from prime_int$table";
        $list = Data::executeSelectQuery($query);

        $query = "select max(number) as number from prime_int" . ($size / 2);

        $maxValue = Data::executeSelectQuery($query);

        if ($maxValue[0]["number"]) {
            $maxValue = $maxValue[0]["number"];
        }
        else {
            $maxValue = pow(2, $size) - 1;
        }

        while ($maxValue <= pow(2, $size * 2) - 2) {
            $maxValue += 2;

            $isPrime = true;

            foreach ($list as $item) {
                $number = $item["number"];
                if ($maxValue % $number == 0) {
                    $isPrime = false;
                }
            }

            if ($isPrime) {
                $query = "insert into prime_int$size values ($maxValue)";
                Data::executeQuery($query);

                echo "<br />-- $maxValue";
            }
        }
    }
    else if ($size == 16) {
        $table = $size / 2; // 8
        $query = "select number from prime_int$table";
        $list_1 = Data::executeSelectQuery($query);

        $table = $table / 2; // 4
        $query = "select number from prime_int$table";
        $list_2 = Data::executeSelectQuery($query);

        $list = array_merge($list_2, $list_1);

        $query = "select max(number) as number from prime_int$size";

        $maxValue = Data::executeSelectQuery($query);

        if ($maxValue[0]["number"]) {
            $maxValue = $maxValue[0]["number"];
        }
        else {
            $maxValue = pow(2, $size) - 1;
        }

        while ($maxValue <= pow(2, $size * 2) - 2) {
            $maxValue += 2;

            $isPrime = true;

            foreach ($list as $item) {
                $number = $item["number"];
                if ($maxValue % $number == 0) {
                    $isPrime = false;
                }
            }

            if ($isPrime) {
                $query = "insert into prime_int$size values ($maxValue)";
                Data::executeQuery($query);

                echo "<br />-- $maxValue";
            }
        }
    }

?>