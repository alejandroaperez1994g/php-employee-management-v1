const returnButton = document.getElementById("return-button");

window.onload = function () {
  let playerInfo = sessionStorage.getItem("playerInfo");

  if (playerInfo != null) {
    let playerInfoJSON = JSON.parse(playerInfo);
    updateForm(playerInfoJSON);
  }
};

returnButton.addEventListener("click", (e) => {
  e.preventDefault();
  location.href = "dashboard.php";
});

const updateForm = (playerInfo) => {
  const playerId = document.getElementById("id");
  const player = document.getElementById("player");
  const playerPosition = document.getElementById("position");
  const playerName = document.getElementById("firstName");
  const playerLastName = document.getElementById("lastName");
  const playerNickname = document.getElementById("nickname");
  const playerAge = document.getElementById("age");
  const playerNationality = document.getElementById("nationality");
  const playerContact = document.getElementById("contact");
  const playerProfile = document.getElementById("profile");
  const playerPrice = document.getElementById("price");
  const playerTeam = document.getElementById("team");

  playerId.value = playerInfo.id;
  player.value = playerInfo.player;
  playerName.value = playerInfo.name;
  playerLastName.value = playerInfo.lastName;
  playerNickname.value = playerInfo.nickname;
  playerAge.value = playerInfo.age;
  playerContact.value = playerInfo.contact;
  playerTeam.value = playerInfo.team;
  playerPrice.value = playerInfo.price;

  Array.from(playerPosition.options).forEach((option) => {
    if (option.value === playerInfo.position) {
      option.selected = true;
    }
  });
  Array.from(playerNationality.options).forEach((option) => {
    if (option.value === playerInfo.nationality) {
      option.selected = true;
    }
  });
  sessionStorage.removeItem("playerInfo");
};
