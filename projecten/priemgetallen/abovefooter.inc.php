
        <div class="abovefooter">
            <br />
            <hr />
            <ul class="ul_lst_none">
<?php

    $array = array();

    $array["balancedDialog"] = "Balanced prime";
    $array["chenDialog"] = "Chen prime";

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
                <p>Bronnen: <a href="https://oeis.org/A006562" target="_blank" rel="noopener noreferrer">Balanced Prime</a></p>
                <hr />
                <button>Sluit</button>
            </form>
        </dialog>        
        <dialog id="chenDialog" class="primedialog">
            <form method="dialog">
                <h3>Chen Prime</h3>
                <p>Een 'chen prime' is een priemgetal, dat ontstaat door een priemgetal met 2 te verhogen. De som is een priemgetal of een 'semiprime'. Een 'semiprime' is een getal dat het product is van twee priemgetallen.</p>
                <p>In de reeks van priemgetallen, is 43 het eerste priemgetal dat geen 'Chen Prime'. Het factoren van 45 (43 + 2) zijn 3 en 15, 5 en 9. Beide factoren moeten priemgetallen zijn en de getallen 9 en 15 zijn geen priemgetallen.</p>
                <p>Bronnen: <a href="https://oeis.org/A109611" target="_blank" rel="noopener noreferrer">Chen Primes</a>, <a href="https://oeis.org/A001358" target="_blank" rel="noopener noreferrer">Semiprime</a>, <a href="https://oeis.org/A102540" target="_blank" rel="noopener noreferrer">Niet Chen priemgetallen</a></p>
                <hr />
                <button>Sluit</button>
            </form>
        </dialog>        
    </body>

    <script>
        function showDialog(id) {
            document.querySelector('#' + id).showModal();
        }
    </script>
