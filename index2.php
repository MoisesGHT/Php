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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Example</title>
</head>
<body>
    <h1>People</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($people as $person): ?>
            <tr>
                <td><?php echo $person["id"]; ?></td>
                <td><?php echo $person["name"]; ?></td>
                <td><?php echo $person["age"]; ?></td>
                <td>
                    <form method="post" action="">
                      <input type="hidden" name="id" value="<?php echo $person["id"];?>">
                      <input type="hidden" name="action" value="update">
                      <input type="hidden" name="name" value="<?php echo $person["name"];?>">
                      <input type="hidden" name="age" value="<?php echo $person["age"];?>">
                      <button type="submit">Update</button>
                    </form>
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?php echo $person["id"]; ?>">
                        <input type="hidden" name="action" value="delete">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <h2>Create Person</h2>
        <form method="post" action="">
            <input type="hidden" name="action" value="create">
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="age" placeholder="Age">
            <button type="submit">Create</button>
        </form>
</body>
</html>