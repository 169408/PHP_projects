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
    <h2>Third project</h2>
    <?php

    require_once "ServiceStation.php";

    require_once "Auto.php";

    require_once "Employee.php";

    $ss = new ServiceStation();

    $employees = [];
    $car1 = new Auto(["name" => "Bmw", "output_year" => 1970, "color" => "red", "place_of_production" => "Ukraine", "current_breakdown" => "everything is broken"]);
    $car2 = new Auto(["name" => "Audi", "output_year" => 2000, "color" => "black", "place_of_production" => "German", "current_breakdown" => "engine"]);

    $employee1 = new Employee(["price_of_hour" => 18, "free" => true, "which_cars_repairs" => ["Universal"]]);
    array_push($employees, $employee1);
    $employee2 = new Employee(["price_of_hour" => 18, "free" => true, "which_cars_repairs" => ["Universal"]]);
    array_push($employees, $employee2);
    $employee3 = new Employee(["price_of_hour" => 15, "free" => false, "which_cars_repairs" => ["output_year" => range(2006, 2023)]]);
    array_push($employees, $employee3);
    $employee4 = new Employee(["price_of_hour" => 20, "free" => false, "which_cars_repairs" => ["place_of_production" => "German"]]);
    array_push($employees, $employee4);
    $employee5 = new Employee(["price_of_hour" => 13, "free" => false, "which_cars_repairs" => ["output_year" => range(1900, 1998)]]);
    array_push($employees, $employee5);
    $employee6 = new Employee(["price_of_hour" => 15, "free" => true, "which_cars_repairs" => ["place_of_production" => "Japan", "current_breakdown"=>"engine"]]);
    array_push($employees, $employee6);
    $employee7 = new Employee(["price_of_hour" => 15, "free" => true, "which_cars_repairs" => ["name" => "Audi", "Universal"]]);
    array_push($employees, $employee7);
    echo $car1->getOutputYear() . "<br/>";
    echo $employee1->carry_diagnostic($car1) . "<br/>";
    echo $employee1->repair($car1) . "<br/>";
    echo $ss->possibility($employee1, $car1, $employees) . "<br/>";
    echo $employee1->carry_diagnostic($car1) . "<br/>";
    echo $employee1->repair($car1) . "<br/>";
    echo $ss->possibility($employee2, $car1, $employees) . "<br/>";
    echo $ss->possibility($employee7, $car1, $employees) . "<br/>";

    echo $ss->possibility($employee6, $car2, $employees) . "<br />";
    echo $employee6->carry_diagnostic($car2) . "<br/>";
    echo $employee6->repair($car2) . "<br/>";
    echo $car2->getCurrentBreakdown() . "<br/>";

    ?>
</body>
</html>
