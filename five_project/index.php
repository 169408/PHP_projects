<?php

require_once "config/connect.php";
require_once "page_control.php";

?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css.css" type="text/css" />
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <h3>Players</h3>
        <tr class="header_row">
            <td>Id</td>
            <td>Name</td>
            <td>Surname</td>
            <td>Age</td>
        </tr>
        <?php
        foreach ($players as $player) {
        ?>
            <tr>
                <td class="primary_key"><?= $player[0]?></td>
                <td><?= $player[1]?></td>
                <td><?= $player[2]?></td>
                <td><?= $player[3]?></td>
            </tr>
        <?php
            }
        ?>
    </table>
    <br/>
    <form action="vendor/create.php" method="post">
        <h2>Add records to the Locations table</h2>
        <p>Location_title: </p>
        <input type="text" name="location_title" placeholder="Location title" />
        <p>Area: </p>
        <input type="text" name="area" placeholder="Area" />
        <br/><br/>
        <button type="submit">Submit</button>
    </form>
    <table border="1">
        <h3>Locations</h3>
        <tr class="header_row">
            <td>Id</td>
            <td>Location title</td>
            <td>Area</td>
        </tr>
        <?php
        foreach ($locations as $location) {
            ?>
            <tr>
                <td class="primary_key"><?= $location[0]?></td>
                <td><?= $location[1]?></td>
                <td><?= $location[2]?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>
