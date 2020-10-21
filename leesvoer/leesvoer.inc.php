
        <dialog id="leesvoerDialog" class="dialog">
            <form method="dialog">
                <strong>Leesvoer</strong>

                <?php

                    foreach ($leesvoer as $key => $value) {
                        $target = "";
                        $extern = "";

                        if (substr($key, 0, 1) !== "/") {
                            $target = " target='_blank'";
                            $extern = " (extern)";
                        }

                        echo "<p><a href='" . $key . "'$target>$value</a>$extern</p>";
                    }                    

                ?>

                <hr />
                <button>Sluit</button>
            </form>
        </dialog>        
