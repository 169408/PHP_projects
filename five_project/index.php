<?php

require_once "config/connect.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    td {
        background: lightpink;
        font-size: 18px;
        margin: 5px;
        padding: 10px 20px;
    }

    .header_row td {
        background: khaki;
        font-size: 23px;
    }

    .primary_key {
        background: gold;
    }

    form {
        background: azure;
        margin: 50px 20px;
        text-align: center;
    }

    form p {
        color: darkblue;
        font-size: 20px;
        font-weight: bold;
    }

    form input {
        margin: 5px;
        padding: 10px;
    }
</style>
<body>
    <table border="1">
        <tr class="header_row">
            <td>Id</td>
            <td>Name</td>
            <td>Surname</td>
            <td>Age</td>
        </tr>
        <?php
            $players = mysqli_query($connect, "SELECT * FROM players");
            $players = mysqli_fetch_all($players);
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
    <form action="vendor/create.php", method="post">
        <h2>Add records to the Locations table</h2>
        <p>Name: </p>
        <input type="text" name="name" placeholder="name" />
        <p>Surname: </p>
        <input type="text" name="surname" placeholder="surname" />
        <p>Age: </p>
        <input type="text" name="age" placeholder="age" />
        <br/><br/>
        <input type="button" value="Submit" />
    </form>
<!--    <table border="1">-->
<!--        <tr class="header_row">-->
<!--            <td>Id</td>-->
<!--            <td>Name</td>-->
<!--            <td>Surname</td>-->
<!--            <td>Age</td>-->
<!--        </tr>-->
<!--        --><?php
//        $players = mysqli_query($connect, "SELECT * FROM players");
//        $players = mysqli_fetch_all($players);
//        foreach ($players as $player) {
//            ?>
<!--            <tr>-->
<!--                <td class="primary_key">--><?//= $player[0]?><!--</td>-->
<!--                <td>--><?//= $player[1]?><!--</td>-->
<!--                <td>--><?//= $player[2]?><!--</td>-->
<!--                <td>--><?//= $player[3]?><!--</td>-->
<!--            </tr>-->
<!--            --><?php
//        }
//        ?>
<!--    </table>-->
</body>
</html>
