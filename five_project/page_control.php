<?php

$players = mysqli_query($connect, "SELECT * FROM players");
$players = mysqli_fetch_all($players);

$locations = mysqli_query($connect, "SELECT * FROM locations");
$locations = mysqli_fetch_all($locations);

?>