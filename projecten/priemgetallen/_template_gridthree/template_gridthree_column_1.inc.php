<?php

    $number = FUNCTIONS::getPost("number");
    $isPrime = null;

    if ($number > 0) {
        if ($number <= 256) {
            $table = "4";
        }
        else if ($number <= 256 * 256) {
            $table = "8";
        }
        else if ($number <= 256 * 256 * 256) {
            $table = "16";
        }

        $query = "select number from prime_int$table where number=$number";

        $rows = Data::executeSelectQuery($query);

        $isPrime = sizeof($rows) ? true : false;
    }

?>    

                <form action="./" method="post">
                    <label for="number">Vul getal in: </label> <input type="number" name="number" id="number" min="0" max="4294967295" value="<?php echo $number; ?>" /> <button>Controleer</button>
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
                
                <?php

                    }

                ?>

