<?php
    var_dump(
        $_POST
    );
?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <h1>Finish Mee</h1>

        <form action="index.php" method="post">
            <label for="name">Naam</label>
            <input name="name" type="text" />
            <button type="submit">versturen</button>
        </form>
    </body>
</html>
