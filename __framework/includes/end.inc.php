
    <script>
        <?php 

        echo FUNCTIONS::minimize(file_get_contents(DOCUMENT_ROOT . '__framework/js/js.js'));
        echo FUNCTIONS::minimize(file_get_contents(DOCUMENT_ROOT . 'js/js.js'));

        ?>

</script>

</html>
