


async function displayTeam () {
    const response = await fetch('../../resources/employees.json'); //Obtener los datos del archivo json
    const data = await response.json(); //Convertir los datos a json
    return data;
}

async function renderTeam () {
    const cardsColumn = document.getElementById('cards-column');
    const teamPlayers = await displayTeam();
    Array.from(teamPlayers).forEach(player => {
        // cardsColumn.append(createCard(player));
        console.log(cardsColumn);
    })
}

renderTeam();

function createCard(playerData) {
     const cardTeam = document.createElement('div');
     cardTeam.classList.add('card_team');
     const cardBodyPlayer = document.createElement('div');
     cardBodyPlayer.classList.add('card-body-player');
        cardTeam.append(cardBodyPlayer);
     const player = document.createElement('div');
     player.classList.add('player');
        cardBodyPlayer.append(player);
     const flag = document.createElement('div');
     flag.classList.add('flag');
        player.append(flag);
    const playerInfo = document.createElement('div');
    playerInfo.classList.add('player-info');
        cardTeam.append(playerInfo);
    const audio = document.createElement('div');
    audio.classList.add('audio');
        playerInfo.append(audio);
        const icon = document.createElement('i');
        icon.classList.add('fa-solid', 'fa-play', 'icon_audio');
        audio.append(icon);
    const playerName = document.createElement('div');
    playerName.classList.add('player-name');
        playerInfo.append(playerName);
        playerName.textContent = `${playerData.name} ${playerData.lastname}`

        console.log("Hola");
    



return card;

}





