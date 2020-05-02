<?php
    session_start();

    if ($_GET['logout']) {
        session_destroy();
        session_start();
    }

    if ($_POST['name']) {
        $_SESSION['name'] = $_POST['name'];
    }

    var_dump($_SESSION);
?>

<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="mystyle.css" >
    </head>
    <body>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <h1>Finish Mee</h1>

        <?php if (isset($_SESSION['name'])): ?>

        <h2>Hallo <?php echo $_SESSION['name']; ?></h2>
        <form action="index.php?logout=true" method="post">
            <button type="submit" value="logout">Uitloggen</button>
        </form>

        <?php else: ?>

        <form action="index.php" method="post">
            <label for="name">Naam</label>
            <input name="name" type="text" />
            <button type="submit">versturen</button>
        </form>

        <?php endif; ?>
  
    </body>
</html>
