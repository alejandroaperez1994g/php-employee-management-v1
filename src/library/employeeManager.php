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
        <tr class='dashboard-row' data-id='{$value['id']}' data-tr>
        <td>{$value['player']}</td>
        <td>{$value['nickname']}</td>
        <td>{$value['price']}</td>
        <td>";
        echo classifyTeam($value['team']);
        echo "</td>
        <td>{$value['position']}</td>
        <td>{$value['age']}</td>
        <td>{$value['nationality']}</td>
        <td>
        <a data-delete-button data-id='{$value['id']}' data-bs-toggle='modal' data-bs-target='#confirmation-delete' href='#'>
        <i class='fa fa-trash text-danger'></i>
        </a>
        </td>
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
        if ($key != 'id') {
            $newArray[$key] = $value;
        }
    }

    array_push($jsonData, $newArray);

    $json = json_encode($jsonData);

    if (file_put_contents('../../resources/employees.json', $json)) {
        header('location: ../../src/employee.php?player_added_successfully');
    } else {
        header('location: ../../src/employee.php?error');
    }
}

function deletePlayer($data)
{
    // print_r($data['id']);

    // Read the JSON file 
    $employeesJSON = file_get_contents('../../resources/employees.json');

    // Decode the JSON file
    $jsonData = json_decode($employeesJSON, true);

    foreach ($jsonData as $key => $value) {
        if ($value['id'] === intval($data['id'])) {
            unset($jsonData[$key]);
        }
    }

    $json = json_encode($jsonData);
    if (file_put_contents('../../resources/employees.json', $json)) {
        echo $json;
    } else {
        echo 'no se guardo';
        //TODO hacer una redireccion a dashboard.php con error por url para advertir al usuario de error al eliminar
    }
}


function findUser($id)
{
    // Read the JSON file 
    $employeesJSON = file_get_contents('../resources/employees.json');

    // Decode the JSON file
    $jsonData = json_decode($employeesJSON, true);

    $player = '';

    foreach ($jsonData as $key => $value) {
        if ($value['id'] == $id) {
            $player = $value;
        }
    }

    return $player;
}

function showPositions($position)
{
    $positions = array('GOALKEEPER', 'DEFENDER', 'MIDFIELDER', 'FORWARD', 'CENTERBACK', 'WINGER');

    foreach ($positions as $key => $value) {
        if ($position == $value) {
            echo "<option selected >$value</option>";
        } else {
            echo "<option>$value</option>";
        }
    }
}
function showTeams($team)
{
    $teams = array(
        'FRONTEND',
        'BACKEND',
        'FULLSTACK',
    );

    foreach ($teams as $key => $value) {
        if ($team == $value) {
            echo "<option selected >$value</option>";
        } else {
            echo "<option>$value</option>";
        }
    }
}

function showNationalitys($nationality)
{
    $nationalitys = array(
        'SPAIN',
        'USA',
        'ARGENTINA',
        'CUBA',
        'VENEZUELA',
        'FRANCE',
        'RUSSIA',
        'BELARUS',
        'ISRAEL',
        'BRAZIL',
        'PORTUGAL',
    );

    foreach ($nationalitys as $key => $value) {
        if ($nationality == $value) {
            echo "<option selected >$value</option>";
        } else {
            echo "<option>$value</option>";
        }
    }
}
