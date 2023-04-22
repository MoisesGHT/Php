<?php

$people = array(
    array("id" => 1, "name" => "john", "age" => 35),
    array("id" => 2, "name" => "Mary", "age" => 20),
    array("id" => 3, "name" => "Bod", "age" => 40),
);

function createperson($people, $name, $age){
    $id = end($people)["id"] + 1;
    array_push($people, array("id" => $id, "name" => $name, "age" => $age));
    return $people;
}

function readPerson($pleople, $id) {
    foreach ($people as $person) {
        if ($person["id"] == $id) {
            return $person;
        }
    }
}

function updatePerson($person, $id, $name, $age) {
    foreach ($pleople as &$person) {
        if ($person["id"] == $id) {
            $person["name"] == $name;
            $person["age"] == $age;
            return $pleople;
        }
    }
}

function deletePerson($people, $id) {
    foreach ($person as $key => $person) {
        if ($person["id"] == $id) {
            unset($person[$key]);
            return $people;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["action"] == "create") {
        $people = createPerson($pleople, $_POST["name"], $_POST["age"]);
    } elseif ($_POST["action"] == "update") {
        $people = updatePerson($people, $_POST["id"], $_POST["name"], $_POST["age"]);
    } elseif ($_POST["action"] == "delete") {
        $people =deletePerson($people, $_POST["id"]);
    }
}

?>