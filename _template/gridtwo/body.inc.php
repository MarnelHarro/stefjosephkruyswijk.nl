    <body>
        <?php

            include DOCUMENT_ROOT . '_template/header.inc.php';
            include DOCUMENT_ROOT . '_template/menu.inc.php';
            include DOCUMENT_ROOT . '_template/title.inc.php';

        ?>

        <div class="displaygrid">

            <?php 

                $columnIndex = 1;

                if ($templatesettings["grid"]) {

                    foreach ($templatesettings["grid"] as $key => $value) {
                    
                        $class="";
    
                        if ($columnIndex < 2) {
                            $class=" class='verticalline'";
                        }
    
                        echo "<div$class>";
                        
                        if (!empty($value)) {                    
                            $header = "<h2>$value</h2>"; 
                            if (empty($key) || is_int($key)) {
                                echo $header;
                            }
                            else {
                                echo "<a href='" . $key . "'>$header</a>";
                            }
                        }
    
                        include "_template_gridtwo/template_gridtwo_column_$columnIndex.inc.php";
    
                        echo "</div>";
    
                        $columnIndex++;
                    }

                }

            ?>

        </div>

