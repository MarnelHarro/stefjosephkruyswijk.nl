    <body>

        <main>
            <header>
                <a href='/'><?php echo $templatesettings["header"]; ?> <span id="subheader"><?php echo $templatesettings["subheader"]; ?><span></a>
            </header>        

            <nav>
                <ul>
                <?php 

                    foreach ($templatesettings["menu"] as $key => $value) {
                        echo "<li class='menuitem'><a href='" . $key . "'>" . $value . "</a></li>";                        
                    }
                ?>

                </ul>
            </nav>

            <?php
                if (!empty($templatesettings["title"])) {
            ?>

            <h1><?php echo $templatesettings["title"]; ?></h1>

            <?php
                }
                else {
            ?>

            <br />

            <?php
                }
            ?>

            <div class="displaygrid">

                <?php 

                    $columnIndex = 1;

                    foreach ($templatesettings["grid"] as $key => $value) {
                        
                        $class="";

                        if ($columnIndex < 4) {
                            $class=" class='verticalline'";
                        }

                        echo "<div$class>";
                        
                        $header = "<h2>$value</h2>"; 
                        if (empty($key) || is_int($key)) {
                            echo $header;
                        }
                        else {
                            echo "<a href='" . $key . "'>$header</a>";
                        }

                        include "template_gridfour_c$columnIndex.inc.php";

                        echo "</div>";

                        $columnIndex++;
                    }

                    /*
                foreach ($templatesettings["grid"] as $key => $value) {
                    echo "<div><h2>" . $key . "</h2>" . $value . "</div>";                        
                    echo "<div><h2>" . $key . "</h2>" . $value . "</div>";                        
                }
                */

                ?>

            </div>

        </main>    
        
    </body>