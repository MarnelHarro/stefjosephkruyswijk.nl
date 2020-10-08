<body>

    <header>
        <a href='/'><?php echo $templatesettings["header"]; ?> <span id="subheader"><?php echo $templatesettings["subheader"]; ?><span></a>
    </header>        

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

    <?php
        if (!empty($templatesettings["title"])) {
    ?>

    <h1><?php echo $templatesettings["title"]; ?></h1>

    <?php
        }
        else {
    ?><br />
    <?php
        }
    ?>

    <div>

        <?php

            include "template_empty.inc.php";

        ?>
        
</body>