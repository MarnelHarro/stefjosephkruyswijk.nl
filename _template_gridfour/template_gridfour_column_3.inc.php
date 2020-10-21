
    <ul style="margin-left: -1em;">
<?php

    foreach ($leesvoer as $key => $value) {
        $target = "";

        if (substr($key, 0, 1) !== "/") {
            $target = " target='_blank'";
        }

        echo "<li><a href='" . $key . "'$target>$value</a></li>";
    }

?>    
    </ul>
