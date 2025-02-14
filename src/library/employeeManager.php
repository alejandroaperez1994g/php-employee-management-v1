<?php
//* show all data from .json file to dashboard.php table
function getAllData()
{

    // Read the JSON file 
    $employeeJSON = file_get_contents('../../resources/employees.json');

    // Decode the JSON file
    $jsonData = json_decode($employeeJSON, true);


    return $jsonData;
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
function addPlayer($post, $files)
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

    if (count($files) > 0) {

        if (isset($files['profile'])) {
            $path = saveProfilePicture($files, $newArray['id']);
            $newArray['profile'] = $path;
        }

        if (isset($files['audio'])) {
            $pathAudio = saveProfileAudio($files, $newArray['id']);
            $newArray['audio'] = $pathAudio;
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
        echo json_encode('error');
        //TODO hacer un mensaje de error para cuando haya problemas con la eliminacion, esto se hace en JS
    }
}

//* delete player from .json file using id
function findUser($id)
{
    // Read the JSON file 
    // $employeesJSON = file_get_contents('../resources/employees.json');
    $employeesJSON = file_get_contents('../../resources/employees.json');

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

//*gets data from .json file
function getJSON()
{
    // Read the JSON file 
    $employeesJSON = file_get_contents('../../resources/employees.json');

    // Decode the JSON file
    $jsonData = json_decode($employeesJSON, true);

    return $jsonData;
}

//* update a player's information
function updatePlayer($post, $files)
{
    $jsonData = getJSON();
    $id = $post['id'];
    $player = '';

    foreach ($jsonData as $key => $value) {
        if ($value['id'] == $id) {
            $player = $value;
            unset($jsonData[$key]);
        }
    }

    foreach ($post as $key => $value) {
        $player[$key] = $value;
    }
    $player['id'] = intval($player['id']);

    if (count($files) > 0) {

        if (isset($files['profile'])) {
            $path = saveProfilePicture($files, $player['id']);
            $player['profile'] = $path;
        }

        if (isset($files['audio'])) {
            $pathAudio = saveProfileAudio($files, $player['id']);
            $player['audio'] = $pathAudio;
        }
    }

    array_push($jsonData, $player);
    $json = json_encode($jsonData);

    if (file_put_contents('../../resources/employees.json', $json)) {
        header('location: ../../src/employee.php?player_updated_successfully');
    } else {
        header('location: ../../src/employee.php?error');
    }
}

function saveProfilePicture($file, $id)
{
    $fileName = $file['profile']['name'];
    $fileTempName = $file['profile']['tmp_name'];
    $fileSize = $file['profile']['size'];
    $fileError = $file['profile']['error'];

    $fileExten = explode('.', $fileName);
    $fileActExt = strtolower(end($fileExten));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {
                $fileDestination = "../../assets/images/profiles/" . "{$id}-" . $fileName;
                move_uploaded_file($fileTempName, $fileDestination);

                return $fileDestination;
            }
        }
    } else {
        header('location: ../../src/employee.php?error');
    }
}

function saveProfileAudio($file, $id)
{
    $fileName = $file['audio']['name'];
    $fileTempName = $file['audio']['tmp_name'];
    $fileSize = $file['audio']['size'];
    $fileError = $file['audio']['error'];

    $fileExten = explode('.', $fileName);
    $fileActExt = strtolower(end($fileExten));

    $allowed = array('mp3');

    if (in_array($fileActExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {
                $fileDestination = "../../assets/audio/" . "{$id}-" . $fileName;
                move_uploaded_file($fileTempName, $fileDestination);

                return $fileDestination;
            }
        }
    } else {
        header('location: ../../src/employee.php?error');
    }
}


function addPlayerFromTable($post)
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
    file_put_contents('../../resources/employees.json', $json);

    return $json;
}
