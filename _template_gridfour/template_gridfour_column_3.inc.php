<?php

    $links = array();

    $links["/leesvoer/zeef-van-eratosthenes/"] = "Zeef van Eratosthenes";

    asort($links);

    foreach ($links as $key => $value) {
        echo "<a href='" . $key . "'>$value</a> ";
    }

    echo "<a href='https://www.scientias.nl/%EF%BF%BC%EF%BF%BCpriemgetallen-de-veilige-basis-van-de-beveiliging-op-internet/' target='_blank'>Priemgetallen: de veilige basis van de beveiliging op internet?</a> &nbsp; ";

?>    
