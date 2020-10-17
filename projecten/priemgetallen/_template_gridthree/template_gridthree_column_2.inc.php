<h3>Type priemgetal</h3>

<?php

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

?>    
