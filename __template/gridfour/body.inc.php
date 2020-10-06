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

            <h1><?php echo $templatesettings["title"]; ?></h1>

            <div class="displaygrid">

                <?php 

                foreach ($templatesettings["grid"] as $key => $value) {
                    echo "<div><h2>" . $key . "</h2>" . $value . "</div>";                        
                }

                ?>

            </div>

        </main>    
        
    </body>