<?php

    $number = FUNCTIONS::getPost("number");
    $isPrime = null;

    if ($number > 0) {
        $byte = 1;
        if ($number < BYTE) {
            $byte = 1;
        }
        else if ($number < BYTE * BYTE) {
            $byte = 2;
        }
        else if ($number < BYTE * BYTE * BYTE) {
            $byte = 3;
        }

        $query = "select max(number) as number from " . PRIME_TABLE . " where number=$number";
        $rows = Data::executeSelectQuery($query);

        $isPrime = sizeof($rows) ? true : false;
    }

?>    

                <br />
                <form action="./" method="post">
                    <label for="number">Vul een getal in: </label> <input type="number" name="number" id="number" min="0" max="4294967295" value="<?php echo $number; ?>" /> <button>Controleer</button>
                </form>

                <?php

                    if (($isPrime or !$isPrime) and $number > 0) {
                        $status = "<strong>geen</strong>";

                        if ($isPrime) {
                            $status = "een";
                        }

                ?>
                
                <hr style="margin-top: 1.5em" />
                <div style="margin-top: 1em">
                    Het getal <?php echo $number; ?> is <?php echo $status; ?> priemgetal
                </div>
                <hr style="margin-top: 1em; margin-bottom: 1em;" />
                
                <?php

                    }

                    if (($isPrime or !$isPrime) and $number > 1) {
                        $sqrt = floor(sqrt($number));

                        $query = "select number from " . PRIME_TABLE . " where number <= $sqrt";  
                        $rows = Data::executeSelectQuery($query);

                        $fractions = array();

                        $countRows = count($rows);
                        for ($index=0; $index < $countRows; $index++) {
                            $fraction = $rows[$index]["number"];

                            if ($number % $fraction == 0) {
                                if ($fraction > 1) {
                                    $fractions[] = $fraction;

                                    $number /= $fraction;
                                    $index--;
                                }
                            }
                        }

                        if ($number > 1) {
                            $fractions[] = $number;
                        }

                        if (count($fractions) > 1) {
                            echo "De factoren zijn: ";

                            $string = "";

                            $previous = 0;
                            $power = 1;
                            
                            foreach ($fractions as $factor) {
                                if ($previous == $factor) {
                                    $power++;
                                }
                                else {
                                    if ($previous == 0) {
                                    // first loop
                                    }
                                    else if ($power == 1) {
                                        $string .= $previous . " x ";
                                    }
                                    else {
                                        $string .= $previous . "<sup>" . $power . "</sup> x ";
                                    }
                                    
                                    $power = 1;
                                }
                                $previous = $factor;
                            }
                            
                            if ($power == 1) {
                                $string .= $previous . " x ";
                            }
                            else {
                                $string .= $previous . "<sup>" . $power . "</sup> x ";
                            }
                            
                            echo substr($string, 0, -3);                            

                            echo "<hr style=\"margin-top: 1em; margin-bottom: 1em;\" />";
                        }
                    }

                ?>

