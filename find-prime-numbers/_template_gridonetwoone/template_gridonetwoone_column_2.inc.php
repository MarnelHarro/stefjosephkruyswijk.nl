
<script>

    setTimeout(() => {
        location.reload();
    }, 1000 * 60 * 16);

</script>

<?php

    set_time_limit(900); 

    define("BYTE", 256);
    define("CORRECTION", 3);
    define("TABLE", "prime_byte_");

    define("BALANCED", "bal");

    function getPrimeArray($byteSize = 1) {
        switch ($byteSize) {
            case 1:
            case 2:
            case 3:
            case 4:
                $query = "select number from " . TABLE . $byteSize;
                $numberArray = Data::executeSelectQuery($query);        

                $array = array();

                foreach ($numberArray as $item) {
                    array_push($array, $item["number"]);
                }

                return $array;
            default:
                return array();
        }
    }

    function addNumber($byte, $number) {
        $query = "insert into " . TABLE . "$byte (number) values ($number)";
        Data::executeQuery($query);
    }

    function updateNumber($byte, $number, $status) {
        $query = "select status from " . TABLE . $byte . " where number=$number";
        $statusArray = Data::executeSelectQuery($query);
        $currentStatus = "";

        foreach ($statusArray as $item) {
            $currentStatus = $item["status"];
        }

        $currentStatus = str_replace(" " . $status, "", $currentStatus);
        $currentStatus .= " " . $status;

        $query = "update " . TABLE . $byte . " set status='$currentStatus' where number=$number";
        Data::executeQuery($query);
    }

    $byte = 0;
    $primeType = FUNCTIONS::getQueryString("type");

    if (!empty($primeType)) {
        switch ($primeType) {
            case "balanced":
                $list = getPrimeArray(1);
                $count = sizeof($list);

                for ($index=1; $index < $count - 1; $index++) {
                    $previous = $list[$index - 1];
                    $next = $list[$index + 1];
                    $average = ($previous + $next)/2;

                    echo "<br />" . $list[$index];

                    if ($average == $list[$index]) {
                        updateNumber(1, $list[$index], BALANCED);
                        echo " - Balanced";
                    }
                }

                break;
        }
    }

    $byte = FUNCTIONS::getQueryString("byte");

    $maxNumber = pow(BYTE, $byte) - CORRECTION;

    if ($byte == 1) {
        $list = [2, 3, 5, 7, 11, 13, 17];

        foreach ($list as $item) {
            addNumber($byte, $item);
        }

        $index = 19;

        while ($index <= $maxNumber) {
            $isPrime = true;

            echo "<br />" . $index;

            foreach ($list as $item) {
                if ($index % $item == 0) {
                    $isPrime = false;
                    break;
                }
            }

            if ($isPrime) {
                echo " - $isPrime";

                addNumber($byte, $index);
            }
    
            $index += 2;
        }
    }
    else if ($byte == 2) {
        $list = getPrimeArray(1);
        $index = pow(BYTE, $byte - 1) + 1;

        while ($index <= $maxNumber) {
            $isPrime = true;

            echo "<br />" . $index;

            foreach ($list as $item) {
                if ($index % $item == 0) {
                    $isPrime = false;
                    break;
                }
            }

            if ($isPrime) {
                echo " - $isPrime";

                addNumber($byte, $index);
            }
    
            $index += 2;
        }        
    }
    else if ($byte == 3) {
        $list_1 = getPrimeArray(1);
        $index = pow(BYTE, $byte - 1) + 1;

        $query = "select max(number) as number from " . TABLE . $byte;
        $maxValue = Data::executeSelectQuery($query);

        if ($maxValue[0]["number"]) {
            $index = $maxValue[0]["number"] + 2;
        }

        $sqrtValue = ceil(sqrt($index));
        
        while ($index <= $maxNumber) {
            $isPrime = true;

            echo "<br />" . $index;

            foreach ($list_1 as $item) {
                if ($index % $item == 0) {
                    $isPrime = false;
                    break;
                }
            }

            if ($isPrime) {
                $list_2 = getPrimeArray(2);

                foreach ($list_2 as $item) {
                    if ($item > $sqrtValue) {
                        break;
                    }

                    if ($index % $item == 0) {
                        $isPrime = false;
                        break;
                    }
                }        

                if ($isPrime) {
                    echo " - $isPrime";

                    addNumber($byte, $index);
                }
            }
    
            $index += 2;
        }        
    }

?>