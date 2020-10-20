
    <h3>Uitleg priemgetal</h3>  
    <p>Een priemgetal is een positief natuurlijk getal (een geheel getal groter dan 0), dat alleen deelbaar is door 1 en zichzelf. Een priemgetal heeft hierdoor twee (verschillende) delers, waardoor het getal 1 hierdoor geen priemgetal is.</p>
    <p>Het getal 7 is een priemgetal. Deel je het getal 7 door 1 t/m 7, dan krijg je twee resultaten met een natuurlijk getal. Dit zijn 1 en 7. Hierdoor is 7 een natuurlijk getal. Het getal 6 is geen priemgetal. Deel je het getal 6 door 1 t/m 6, dan krijg je vier resultaten met een geheel getal. Dit zijn 1, 2, 3 en 6. Doordat er niet twee delers zijn, is het getal geen priemgetal.</p>
    <p>De priemgetallen onder 100 zijn: 2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89 and 97.</p>

<?php

    if (false) {

        echo "<h3>Type priemgetal</h3>";

        if ($isPrime) {
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
            
            $query = "select status from prime_byte_" . $byte . " where number=$number";
            $statusArray = Data::executeSelectQuery($query);        

            $status = "";

            foreach ($statusArray as $item) {
                $status = $item["status"];
            }        

            if (empty($status)) {
                echo "Geen informatie beschikbaar.";
            }
            else {
                $array = explode(" ", $status);
                $array = array_filter($array);

                foreach ($array as $item) {
                    if ($item === BALANCED) {
                        echo "<a href=javascript:showDialog('balancedDialog');>Balanced</a> ";
                    }
                    if ($item === CHEN) {
                        echo "<a href=javascript:showDialog('chenDialog');>Chen</a> ";
                    }
                }
            }
        }
        else {
            echo "Geen informatie beschikbaar.";
        }
    }

?>    
