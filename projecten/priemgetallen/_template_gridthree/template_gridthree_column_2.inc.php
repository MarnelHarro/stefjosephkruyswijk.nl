<h3>Type priemgetal</h3>

<?php

    if ($isPrime) {
        $byte = 1;
        if ($number < 256 * 256 * 256) {
            $byte = 3;
        }
        if ($number < 256 * 256) {
            $byte = 2;
        }
        if ($number < 256) {
            $byte = 1;
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
