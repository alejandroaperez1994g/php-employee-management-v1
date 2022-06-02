<?php
//* show all data from .json file to dashboard.php table
function showAllData()
{

    // Read the JSON file 
    $employeeJSON = file_get_contents('../resources/employees.json');

    // Decode the JSON file
    $jsonData = json_decode($employeeJSON, true);

    foreach ($jsonData as $key => $value) {
        echo "
        <tr data-id='{$value['id']}'>
        <td>{$value['player']}</td>
        <td>{$value['nickname']}</td>
        <td>{$value['price']}</td>
        <td>";
        echo classifyTeam($value['team']);
        echo "</td>
        <td>{$value['position']}</td>
        <td>{$value['age']}</td>
        <td>{$value['nationality']}</td>
        <td><a href='editDesignation.php'><i class='fa fa-pen text-success'></i></a> <a href='editDesignation.php'><i class='fa fa-trash text-danger'></i></a></td>
    </tr>
    ";
    }
}

//* classify the team value and return respective badge
function classifyTeam($team)
{
    switch ($team) {
        case 'FRONTEND':
            echo "<span class='badge bg-warning text-dark'>{$team}</span>";
            break;
        case 'BACKEND':
            echo "<span class='badge bg-danger'>{$team}</span>";
            break;
        case 'FULLSTACK':
            echo "<span class='badge bg-success'>{$team}</span>";
            break;
    }
}


//* add form data to .json file
function addPlayer($post)
{
    // Read the JSON file 
    $employeesJSON = file_get_contents('../../resources/employees.json');

    // Decode the JSON file
    $jsonData = json_decode($employeesJSON, true);
    $lastId = end($jsonData)['id'];



    // New Array
    $newArray = array();
    $newArray['id'] = $lastId + 1;

    foreach ($post as $key => $value) {
        $newArray[$key] = $value;
    }

    array_push($jsonData, $newArray);

    $json = json_encode($jsonData);

    if (file_put_contents('../../resources/employees.json', $json)) {
        header('location: ../../employee.php?player_added_successfully');
    } else {
        header('location: ../../employee.php?error');
    }
}
