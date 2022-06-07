
async function displayTeam () {
    const response = await fetch('../../resources/emoplyee.json'); //Obtener los datos del archivo json
    const data = await response.json(); //Convertir los datos a json
    return data;
}

function renderTeam () {
    const teamPlayers = await displayTeam();
    console.log(teamPlayers);
}

// renderTeam();

console.log(displayTeam());

