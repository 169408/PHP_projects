<?php

$faker = Faker\Factory::create('uk_UA');
$array_letter = ["A", "B", "C", "D"];

$count = mysqli_query($connect, "SELECT COUNT(*) FROM school");
$count = mysqli_fetch_all($count);

if($count[0][0] == 0) {
    for ($i = 1; $i < 12; $i++) {
        if($i == 10 || $i == 11) {
            $last = rand(1, count($array_letter)-2);
        } else {
            $last = rand(1, count($array_letter));
        }
        for($j = 0; $j < $last; $j++) {
            $last_name = $array_letter[$j];
            $number = rand(20, 35);
            mysqli_query($connect, "INSERT INTO school (first_name, last_name, number) VALUES ('$i', '$last_name', $number)");
        }
    }
}

$school = mysqli_query($connect, "SELECT * FROM school");
$school = mysqli_fetch_all($school);

$count2 = mysqli_query($connect, "SELECT COUNT(*) FROM schoolchilds");
$count2 = mysqli_fetch_all($count2);

if($count2[0][0] == 0) {
    for ($k = 0; $k < count($school); $k++) {
        $class_id = $school[$k];
        $class_info = mysqli_query($connect, "SELECT * FROM school WHERE class_id = $class_id[0]");
        $class_info = mysqli_fetch_assoc($class_info);
        for ($l = 0; $l < $class_info["number"]; $l++) {
            $name = "\"$faker->firstName\"";
            $surname = "\"$faker->lastName\"";
            $city = "\"$faker->city\"";
            mysqli_query($connect, "INSERT INTO schoolchilds (name, surname, city, class_id) VALUES ($name, $surname, $city, $class_id[0])");
        }
    }
}

$school_childs = mysqli_query($connect, "SELECT * FROM schoolchilds");
$school_childs = mysqli_fetch_all($school_childs);

?>
