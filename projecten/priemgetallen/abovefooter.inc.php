
        <div class="abovefooter">
            <br />
            <hr />
            <ul class="ul_lst_none">
<?php

    $array = array();

    $array["balancedDialog"] = "Balanced prime";
    //$ array["./chen-prime/"] = "Chen prime";
    // $array["./twin-prime/"] = "Twin prime";

    $index = 0;
    foreach ($array as $key => $value) {
        echo "<li><a href=javascript:showDialog('" . $key . "');>$value</a></li>";        
    }

?>
            </ul>
        </div>

        <dialog id="balancedDialog" class="primedialog">
            <form method="dialog">
                <h3>Balanced Prime</h3>
                <p>Een 'balanced prime' is een priemgetal, dat het gemiddelde is van twee priemgetallen. Deze priemgetallen zijn het vorige priemgetal en het volgende priemgetal.</p>
                <p>Neem de eerste tien priemgetallen: 2, 3, 5, 7, 11, 13, 17, 19, 23 en 29. In de reeks komt &eacute;&eacute;n 'balanced priemgetal' voor, namelijk 5. Het vorige priemgetal is 3 en het volgende is 7. Deze tel je samen op en dan krijg je 10. Dit deel je door twee en het resultaat is 5. Hierdoor is het getal 5 een 'balanced prime'.</p>
                <hr />
                <button>Sluit</button>
            </form>
        </dialog>        
    </body>

    <script>
        function showDialog(id) {
            document.querySelector('#' + id).showModal();
        }

        // showDialog("balancedDialog");

    </script>
