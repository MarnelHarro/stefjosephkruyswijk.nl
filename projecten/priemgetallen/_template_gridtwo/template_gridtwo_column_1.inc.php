<?php

    $number = FUNCTIONS::getPost("number");
    $isPrime = null;

    $maxInteger = 0;

    $byte = 4;
    while ($maxInteger == 0) {
        $query = "select max(number) as number from " . TABLE . $byte;
        $maxArray = Data::executeSelectQuery($query);    

        if (isset($maxArray[0]["number"])) {
            $maxInteger = $maxArray[0]["number"];
        }

        $byte--;
    }

    $isValid = ($number > 0) && ($number < $maxInteger);

    if ($isValid) {
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
        else if ($number < BYTE * BYTE * BYTE * BYTE) {
            $byte = 4;
        }
        
        $query = "select number from prime_byte_" . $byte . " where number=$number";
        $rows = Data::executeSelectQuery($query);

        $isPrime = sizeof($rows) ? true : false;
    }

?>    

                <br />
                <form action="./" method="post">
                    <label for="number">Voer </label> <input type="number" name="number" id="number" value="<?php echo $number; ?>" placeholder="een getal in" /> <button>Controleer</button>
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
                <hr style="margin-top: 1em" />
                
                <?php

                    }

                    if (!$isValid) {
                ?>

                <hr style="margin-top: 1.5em" />
                <div style="margin-top: 1em">
                    Vul een getal in tussen 1 en <?php echo $maxInteger; ?>.
                </div>
                <hr style="margin-top: 1em" />

                <?php
                    }

                ?>

