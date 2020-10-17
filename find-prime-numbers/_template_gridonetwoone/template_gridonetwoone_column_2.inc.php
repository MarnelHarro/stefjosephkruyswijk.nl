
<script>

    setTimeout(() => {
        location.reload();
    }, 1000 * 60 * 16);

</script>

<?php

    set_time_limit(900); 

    function getFactors($number) {
        $array = array();

        for ($index=2; $index <= floor($number / 2); $index++) {
            if ($number % $index == 0) {
                array_push($array, $index);
            }
        }

        return $array;
    }

    function getPrimeFactors($number) {
        $list = getPrimeArray(1);
        $array = array();

        foreach ($list as $item) {
            if ($item >= $number) {
                break;
            }
            if ($number % $item == 0) {
                array_push($array, $item);
            }
        }

        return $array;
    }

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

    function isPrime($number) {
        $byte = 0;
        if ($number < BYTE) {
            $byte = 1;
        }
        else if ($number < BYTE * BYTE) {
            $byte = 2;
        }
        else if ($number < BYTE * BYTE * BYTE) {
            $byte = 3;
        }
        else if ($number < BYTE * BYTE * BYTE * BYTE) {
            $byte = 4;
        }

        $query = "select number from " . TABLE . $byte . " where number=$number";
        $array = Data::executeSelectQuery($query);

        return !empty($array);
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
            case "chen":
                $list = getPrimeArray(1);

                foreach ($list as $item) {
                    $next = $item + 2;
                    
                    $isChenPrime = true;
                    
                    if (!isPrime($next)) {
                        $factors = getFactors($next);

                        foreach ($factors as $factor) {
                            if (!isPrime($factor)) {
                                $isChenPrime = false;

                                break;
                            }
                        }    
                    }

                    echo "<br />" . $item;
                    
                    if ($isChenPrime) {
                        updateNumber(1, $item, CHEN);
                        echo " - Chen";
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