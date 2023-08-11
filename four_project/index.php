<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>
        Project Four
    </h2>

    <?php
    $states = ["Terrible", "Very bad", "Bad", "Normal", "Well", "Very well", "Fantastic mood"];
    require_once "T70.php";
    require_once "HR_T1000.php";
    require_once "HR_T999.php";
    require_once "T1001.php";
    require_once "T1002.php";
    require_once "Programmer.php";
    require_once "Essence.php";

    $termitnatorT70 = new T70();
    $termitnatorT70->state = $states[rand(0, count($states) - 1)];
    echo "Start state: " . $termitnatorT70->state . "<br/><br/>";
    $essence = new Essence();

    $termitnatorHR_T1000 = new HR_T1000();
    $termitnatorHR_T999 = new HR_T999();
    $terminatorT1001 = new T1001();
    $terminatorT1002 = new T1002();
    $programmer1 = new Programmer("Darius", 30);
    $programmer2 = new Programmer("Dmytro", 18);
    for($i = 0; $i < 6; $i++) {
        $termitnatorT70->change_state($termitnatorT70->state, $states, $programmer1->work(), [$termitnatorHR_T1000, $termitnatorHR_T999], [$terminatorT1001, $terminatorT1002], $essence);
    }

    echo "{$programmer1->name} was reprimanded " . $termitnatorHR_T1000->admonition . " times.<br/>";
    echo "{$programmer1->name} was praised " . $terminatorT1001->praise . " times.<br/><br/>";

    echo "{$programmer1->name} was praised " . $terminatorT1002->praise . " times.<br/><br/>";
    echo "{$programmer1->name} was reprimanded " . $termitnatorHR_T999->admonition . " times.<br/>";

    ?>
</body>
</html>