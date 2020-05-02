<?php
    require_once(__DIR__.'/database.php');

    # Gebruikerssessie logica
    session_start();
    if (isset($_GET['logout'])) {
        session_destroy();
        session_start();
    }
    if (isset($_POST['name'])) {
        $_SESSION['name'] = $_POST['name'];
    }
    var_dump($_SESSION);

    # Connect met database
    $db = Database::connect();
    $tables = $db->getDatabaseTables();
    if (empty($tables)) {
        $db->createSchema();
    }
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

        <!-- Hier komt het overzicht van bestaande spellen -->
        <h2>Bestaande potjes</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Naam</th>
                    <th scope="col">Gastheer</th>
                    <th scope="col">Spelers</th>
                    <th>Actie</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($db->getRooms() as $room): ?>
                <tr>
                    <td><?php echo $room['name']; ?></td>
                    <td><?php echo $room['host']; ?></td>
                    <td>TODO</td>
                    <td><button>Meedoen!</button></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
  
    </body>
</html>
