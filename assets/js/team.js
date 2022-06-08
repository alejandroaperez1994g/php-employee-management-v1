

async function displayTeam() {
  const response = await fetch("../../resources/employees.json"); //Obtener los datos del archivo json
  const data = await response.json(); //Convertir los datos a json
  return data;
}

async function renderTeam() {
  const cardsColumn = document.getElementById("cards-column");

  const teamPlayers = await displayTeam();
  Object.values(teamPlayers).forEach((player) => {
    cardsColumn.append(createCard(player));

  }); 
  const audioPlayIcons = document.querySelectorAll("[data-audio]")
  setEventListenersAudio(audioPlayIcons);
}

function setEventListenersAudio (audioElementsList) {
  Array.from(audioElementsList).forEach(icon => {
    icon.addEventListener('click', (e) => {
      const audioElement = e.target.parentElement
      const audioPath = audioElement.getAttribute("data-audio")
    if (audioPath != "..undefined") {
      const audio = new Audio(audioPath);
      audio.play();
    } else {
      const audio = new Audio('../audio/default.mp3');
      audio.play();
    }

    

    },{once: true});
  })
}



renderTeam();

function createCard(playerData) {

  const cardTeam = document.createElement("div");
  cardTeam.classList.add("card_team");
  const cardBodyPlayer = document.createElement("div");
  cardBodyPlayer.classList.add("card-body-player");
  cardTeam.append(cardBodyPlayer);
  const player = document.createElement("div");
  player.classList.add("player"); //background-image: silueta.png;
  player.style.backgroundImage = `url(..${playerData.profile?.slice(12)})`; //replace png image player

  cardBodyPlayer.append(player);
  const flag = document.createElement("div");
  flag.classList.add("flag");
  flag.textContent = addFlag(playerData.nationality);
  player.append(flag);
  const playerInfo = document.createElement("div");
  playerInfo.classList.add("player-info");
  cardTeam.append(playerInfo);

  //Audio 
  const audio = document.createElement("div");
  audio.setAttribute("data-audio", `..${playerData.audio?.slice(12)}`)
  audio.classList.add("audio");
  playerInfo.append(audio);
  const icon = document.createElement("i");
  icon.classList.add("fa-solid", "fa-play", "icon_audio");
  audio.append(icon);

  const playerName = document.createElement("div");
  playerName.classList.add("player_name");
  playerInfo.append(playerName);
  playerName.textContent = `${playerData.name} ${playerData.lastName}`;
  const iconsFlex = document.createElement("div");
  iconsFlex.classList.add("icons-flex");
  cardTeam.append(iconsFlex);
  const dorsal = document.createElement("span");
  dorsal.classList.add("dorsal");
  iconsFlex.append(dorsal);
  const dorsaltext = document.createElement("span");
  dorsaltext.classList.add("dorsaltext");
  dorsaltext.textContent ="DORSAL";
  dorsal.append(dorsaltext);
  //Dorsal Text
  const dorsalNumber = document.createElement("span");
  dorsalNumber.textContent = playerData.price;
  dorsal.append(dorsalNumber);
// Age
  const age = document.createElement("span");
  age.classList.add("age");
  const ageText = document.createElement("span");
  ageText.classList.add("ageNumber");
  ageText.textContent = "AGE";
  const ageNumber = document.createElement("span");
  ageNumber.textContent = playerData.age;
  age.append (ageText, ageNumber);
  iconsFlex.append (age);

  // Team Icon
  const teamIcon = document.createElement("span");
  teamIcon.classList.add("teamIcon");
  teamIcon.append(iconTeam(playerData.team)); 
  iconsFlex.append(teamIcon);

  // LinkedIn Icon
  const linkedin = document.createElement("span");
  linkedin.classList.add("linkedin");
  iconsFlex.append(linkedin);
  const linkedInIcon = document.createElement("i");
  linkedInIcon.classList.add("fa-brands", "fa-linkedin", "fa-team-icon");
  const linkPlayer = document.createElement("a");
  linkPlayer.href = playerData.contact;
  linkPlayer.append(linkedInIcon)
  linkPlayer.setAttribute("target", "_blank");
  linkedin.append(linkPlayer);


  return cardTeam;
}


function addFlag (flag) {
  switch (flag) {
    case "SPAIN":
      return "🇪🇸";
      break;
    case "BRAZIL":
      return "🇧🇷";
      break;
    case "USA":
      return "🇺🇸";
      break;
    case 'BELARUS':
      return "🇧🇾";
      break;
    case 'ARGENTINA':
      return "🇦🇷";
      break;
    case 'CUBA':
      return "🇨🇺";
      break;
    case 'VENEZUELA':
      return "🇻🇪";
      break;
    case 'FRANCE':
      return "🇫🇷";
      break;
    case 'RUSSIA':
      return "🇷🇺";
      break;
    case 'ISRAEL':
      return "🇮🇱";
      break;
    case 'PORTUGAL':
      return "🇵🇹";
      break;

    default:
      return "🇺🇳";
      break;
  }

}

function iconTeam (team) {
  const teamIcon = document.createElement("i");

  switch (team) {
    case "FULLSTACK":
      teamIcon.classList.add("fa-solid", "fa-user-secret", "fa-team-icon");
      return teamIcon;
      break;
    case "BACKEND":
      teamIcon.classList.add("fa-solid", "fa-gears", "fa-team-icon");
      return teamIcon;
      break;
    case "FRONTEND":
      teamIcon.classList.add("fa-solid", "fa-laptop-code", "fa-team-icon");
      return teamIcon;
      break;
  
      default:
        teamIcon.classList.add("fa-solid", "fa-code", "fa-team-icon");
        return teamIcon;
        break;
    }
  }
