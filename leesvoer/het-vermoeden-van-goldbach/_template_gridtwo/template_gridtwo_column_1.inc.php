<?php

    $number = FUNCTIONS::getPost("number");
    $rows = array();

    if ($number >= 4) {
        if ($number % 2 == 0) {
            $query = "select number from prime_byte_1 where number <= " . ($number/2);
            $temp = Data::executeSelectQuery($query);

            foreach ($temp as $row) {
                $rows[] = $row["number"];
            }
        }
    }

?>    

                <br />
                <form action="./" method="post">
                    <label for="number">Vul een getal in: </label> <input type="number" name="number" id="number" min="0" max="4294967295" value="<?php echo $number; ?>" /> <button>Controleer</button>
                </form>

                <?php

                    if ($rows) {
                        $fractions = array();

                        foreach ($rows as $fraction) {
                            $minus = $number - $fraction;
                            $isPrime = false;

                            $query = "select number from " . PRIME_TABLE . " where number = $minus"; 
                            $temp = Data::executeSelectQuery($query);

                            foreach ($temp as $row) {
                                $isPrime = true;
                            }

                            if ($isPrime) {
                                $fractions[] = $fraction;
                            }
                        }

                        echo "<hr style=\"margin-top: 1em; margin-bottom: 1em;\" />";
                        $extrainfo = "";

                        $string = "";

                        foreach ($fractions as $fraction) {
                            if ($byte > 1) {
                                $extrainfo = " (met een partitie onder de 256)";
                            }

                            if (!empty($string)) {
                                $string .= ", ";
                            }

                            $string .= " $fraction en " . ($number - $fraction);
                        }

                        echo "De gevonden Goldbach-partities$extrainfo zijn:";
                        echo $string;

                        echo "<hr style=\"margin-top: 1em;\" />";
                    }
                    else {
                        echo "<hr style=\"margin-top: 1em; margin-bottom: 1em;\" />";
                        echo "Alleen even getallen (met een minimale waarde van 4) worden gecontroleerd.";
                        echo "<hr style=\"margin-top: 1em;\" />";
                    }

                ?>

