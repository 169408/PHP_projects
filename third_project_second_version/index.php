<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta car_brand="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Service Station</h2>
<?php

$car_brands = ["Audi", "Bmw", "Ford", "Chevrolet", "Lexus", "Jeep", "Inferno"];
$output_years = [range(1970, 1979), range(1980, 1994), range(1995, 2005), range(2006, 2022)];
$places_of_production = ["England", "Germany", "France", "Ukraine", "Poland", "USA", "Kanada"];
$breakdowns = ["engine", "overheating", "malfunction of the automatic transmission", "broken brakes", "Electrical problem"];

//$arr = [];
//array_push($arr, $car_brands[array_rand($car_brands)]);
//array_push($arr, $output_years[array_rand($output_years)][array_rand($output_years[array_rand($output_years)])]);
//array_push($arr, $places_of_production[array_rand($places_of_production)]);
//array_push($arr, $breakdowns[array_rand($breakdowns)]);
//print_r($arr);



require_once "ServiceStation.php";

require_once "Auto.php";

require_once "Employee.php";

$ss = new ServiceStation();

$employees = [];
$car1 = new Auto(["car_brand" => "Bmw", "output_year" => 1970, "color" => "red", "place_of_production" => "Ukraine", "current_breakdown" => "broken brakes"]);
$car2 = new Auto(["car_brand" => "Audi", "output_year" => 2000, "color" => "black", "place_of_production" => "Germany", "current_breakdown" => "engine"]);

$employee1 = new Employee(["name" => "Employee 1", "price_of_hour" => 18, "free" => true, "which_cars_repairs" => ["car_brand" => $car_brands, "output_year" => $output_years, "place_of_production" => $places_of_production, "current_breakdown" => $breakdowns]]);
array_push($employees, $employee1);
$employee2 = new Employee(["name" => "Employee 2", "price_of_hour" => 18, "free" => false, "which_cars_repairs" => ["car_brand" => $car_brands, "output_year" => $output_years, "place_of_production" => $places_of_production, "current_breakdown" => $breakdowns]]);
array_push($employees, $employee2);
$employee3 = new Employee(["name" => "Employee 3", "price_of_hour" => 15, "free" => true, "which_cars_repairs" => ["car_brand" => $car_brands, "output_year" => range(2006, 2023), "place_of_production" => ["France"], "current_breakdown" => $breakdowns]]);
array_push($employees, $employee3);
$employee4 = new Employee(["name" => "Employee 4", "price_of_hour" => 20, "free" => false, "which_cars_repairs" => ["car_brand" => $car_brands, "output_year" => $output_years, "place_of_production" => ["Germany"], "current_breakdown" => $breakdowns]]);
array_push($employees, $employee4);
$employee5 = new Employee(["name" => "Employee 5", "price_of_hour" => 13, "free" => false, "which_cars_repairs" => ["car_brand" => $car_brands, "output_year" => range(1970, 1979), "place_of_production" => $places_of_production, "current_breakdown" => $breakdowns]]);
array_push($employees, $employee5);
$employee6 = new Employee(["name" => "Employee 6", "price_of_hour" => 15, "free" => false, "which_cars_repairs" => ["car_brand" => $car_brands, "output_year" => $output_years, "place_of_production" => ["Japan"], "current_breakdown" => ["engine"]]]);
array_push($employees, $employee6);
$employee7 = new Employee(["name" => "Employee 7", "price_of_hour" => 15, "free" => true, "which_cars_repairs" => ["car_brand" => ["Audi"], "output_year" => $output_years, "place_of_production" => $places_of_production, "current_breakdown" => $breakdowns]]);
array_push($employees, $employee7);

$ss->possibility($car1, $employees);
$ss->possibility($car2, $employees);

?>
</body>
</html>