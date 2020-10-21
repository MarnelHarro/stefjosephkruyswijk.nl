
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

        function checkAndAddPrime($index, $list, $maxNumber, $byte) {
            while ($index <= $maxNumber) {
                $isPrime = true;

                foreach ($list as $item) {
                    if ($index % $item == 0) {
                        $isPrime = false;
                        break;
                    }
                }

                if ($isPrime) {
                    addNumber($byte, $index);
                }

                $index += 2;
            }
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

        // BYTE 1
        $byte = 1;
        $primes = getPrimeArray($byte);
        $maxNumber = pow(BYTE, $byte) - CORRECTION;

        if (count($primes) == 0) {
            $list = [2, 3, 5, 7, 11, 13, 17];

            foreach ($list as $item) {
                addNumber($byte, $item);
            }

            $index = 19;

            echo "<br />Start with: $index (and stop $maxNumber)";

            checkAndAddPrime($index, $list, $maxNumber, $byte);

            /*
            while ($index <= $maxNumber) {
                $isPrime = true;

                foreach ($list as $item) {
                    if ($index % $item == 0) {
                        $isPrime = false;
                        break;
                    }
                }

                if ($isPrime) {
                    addNumber($byte, $index);
                }

                $index += 2;
            }
            */
        }

        $primes = getPrimeArray(1);

        echo "<br /><strong>Byte 1</strong>";
        if (count($primes) == 54) {
            echo "<br />All 54 primes found";
        }
        else {
            echo "<br />Did not found 54 primes, but found " . count($primes) . " primes";
        }
        // END BYTE 1

        // BYTE 2
        $byte = 2;
        $primes = getPrimeArray($byte);

        $maxNumber = pow(BYTE, $byte) - CORRECTION;
        $index = $maxNumber + 1;
        $list = getPrimeArray(1);

        if (count($primes) == 0) {
            $index = pow(BYTE, $byte - 1) + 1;
        }

        echo "<br /><strong>Byte 2</strong>";
        echo "<br />Start with: $index (and stop $maxNumber)";

        checkAndAddPrime($index, $list, $maxNumber, $byte);

        /*
        while ($index <= $maxNumber) {
            $isPrime = true;

            foreach ($list as $item) {
                if ($index % $item == 0) {
                    $isPrime = false;
                    break;
                }
            }

            if ($isPrime) {
                addNumber($byte, $index);
            }

            $index += 2;
        }
        */

        $primes = getPrimeArray($byte);

        if (count($primes) == 6488) {
            echo "<br />All 6488 primes found";
        }
        else {
            echo "<br />Did not found 6488 primes, but found " . count($primes) . " primes";
        }
        // END BYTE 2

        // BYTE 3
        $byte = 3;
        $primes = getPrimeArray($byte);

        $maxNumber = pow(BYTE, $byte) - CORRECTION;
        $index = $maxNumber + 1;
        $list = getPrimeArray(1);

        if (count($primes) == 0) {
            $index = pow(BYTE, $byte - 1) + 1;
        }
        else {
            $query = "select max(number) as number from " . TABLE . $byte;
            $maxArray = Data::executeSelectQuery($query);

            $index = $maxArray[0]["number"] + 2;
        }

        echo "<br /><strong>Byte 3</strong>";
        echo "<br />Start with: $index (and stop $maxNumber)";

        while ($index <= $maxNumber) {
            $isPrime = true;

            foreach ($list as $item) {
                if ($index % $item == 0) {
                    $isPrime = false;
                    break;
                }
            }

            if ($isPrime) {
                //check if sqrt is larger than a byte, to get more primes
                $sqrtValue = sqrt($index);
                if ($sqrtValue > BYTE) {
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

                }

                if ($isPrime) {
                    addNumber($byte, $index);
                }
            }

            $index += 2;
        }

        $primes = getPrimeArray($byte);

        if (count($primes) == 1579) {
            echo "<br />All 1579 primes found";
        }
        else {
            echo "<br />Did not found 1579 primes, but found " . count($primes) . " primes";
        }
        // END BYTE 3

        // BYTE 4
        $byte = 4;
        $primes = getPrimeArray($byte);

        $maxNumber = pow(BYTE, $byte) - CORRECTION;
        $index = $maxNumber + 1;
        $list = getPrimeArray(1);

        if (count($primes) == 0) {
            $index = pow(BYTE, $byte - 1) + 1;
        }
        else {
            $query = "select max(number) as number from " . TABLE . $byte;
            $maxArray = Data::executeSelectQuery($query);

            $index = $maxArray[0]["number"] + 2;
        }

        echo "<br /><strong>Byte 4</strong>";
        echo "<br />Start with: $index (and stop $maxNumber)";

        while ($index <= $maxNumber) {
            $isPrime = true;

            foreach ($list as $item) {
                if ($index % $item == 0) {
                    $isPrime = false;
                    break;
                }
            }

            if ($isPrime) {
                //check if sqrt is larger than a byte, to get more primes
                $sqrtValue = sqrt($index);
                if ($sqrtValue > BYTE) {
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

                }

                if ($isPrime) {
                    addNumber($byte, $index);
                }
            }

            $index += 2;
        }

        $primes = getPrimeArray($byte);

        if (count($primes) == 1579) {
            echo "<br />All 1579 primes found";
        }
        else {
            echo "<br />Did not found 1579 primes, but found " . count($primes) . " primes";
        }
        // END BYTE 4

        ?>