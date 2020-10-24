
<?php

    set_time_limit(290); 

    /*
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
    */

    function getPrimeArray() {
        $query = "select number from " . PRIME_TABLE;
        $numberArray = Data::executeSelectQuery($query);        

        $array = array();

        foreach ($numberArray as $item) {
            array_push($array, $item["number"]);
        }

        return $array;
    }

    function isPrime($number) {
        $query = "select number from " . PRIME_TABLE . " where number=$number";
        $array = Data::executeSelectQuery($query);

        return !empty($array);
    }

    function addNumber($number) {
        $query = "insert into " . PRIME_TABLE . " (number) values ($number)";
        Data::executeQuery($query);
    }

    /*
    
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

    */

    // get the current list
    $primes = getPrimeArray();

    // if empty, add the first 7 primes
    if (count($primes) == 0) {
        $primes = [2, 3, 5, 7, 11, 13, 17];

        foreach ($primes as $item) {
            addNumber($item);
        }
    }

    $index = $primes[count($primes) - 1];
    $maxNumber = pow($index, 2);
    $index += 2;

    if ($maxNumber > pow(2, 32)) {
        $maxNumber = pow(2, 32) - 3;
    }

    if (ISLOCALHOST) {
        echo "<br />Start with: $index (and stop at $maxNumber)";
    }

    while ($index <= $maxNumber) {
        $isPrime = true;

        foreach ($primes as $item) {
            if ($index % $item == 0) {
                $isPrime = false;
                break;
            }
        }

        if ($isPrime) {
            addNumber($index);

            if (ISLOCALHOST) {
                echo "<br />- $index";
            }
        }

        $index += 2;
    }

?>
