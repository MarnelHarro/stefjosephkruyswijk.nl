
        <nav>
            <ul>

                <?php 

                foreach ($templatesettings["menu"] as $key => $value) {
                    $class = "menuitem";

                    if ($key == SUBDIRECTORY) {
                        $class = "active";
                    }

                    echo "<li class='" . $class . "'><a href='" . $key . "'>" . $value . "</a></li>";                        
                }
            ?>


            </ul>
        </nav>
