
        <div class="abovefooter">
            <br />
            <hr />
            <ul class="ul_lst_none">
<?php

    $array = array();

    $array["./balanced-prime/"] = "Balanced prime";
    $array["./chen-prime/"] = "Chen prime";
    $array["./twin-prime/"] = "Twin prime";

    $index = 0;
    foreach ($array as $key => $value) {
        echo "<li><a href='" . $key . "'>$value</a></li>";        
    }

?>
            </ul>
        </div>
    </body>