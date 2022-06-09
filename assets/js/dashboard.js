const dashboardInfo = document.getElementById("app");
const playAudio = document.getElementById("play-audio");

playAudio.addEventListener(
  "click",
  () => {
    const audio = new Audio("../audio/presentation.mp3");
    audio.play();
  },
  { once: true }
);

//*get all data from .json file employees.json
const getAllData = async () => {
  const response = await fetch("../../resources/employees.json");
  const data = await response.json(); //* converts the response to json
  return data;
};

//* update de dashboard-info.html cards elements
const updateDashboardCards = async () => {
  const totalPlayer = document.getElementById("total-players");
  const frontEndCard = document.getElementById("frontend");
  const backEndCard = document.getElementById("backend");
  const fullStackCard = document.getElementById("fullstack");

  const totalOfPlayers = await getAllData();

  const totalFrontEnd = Object.values(totalOfPlayers).filter(
    (player) => player.team === "FRONTEND"
  );
  const totalBackEnd = Object.values(totalOfPlayers).filter(
    (player) => player.team === "BACKEND"
  );
  const totalFullStack = Object.values(totalOfPlayers).filter(
    (player) => player.team === "FULLSTACK"
  );

  //*set the lenght of respective players teams
  totalPlayer.textContent = Object.values(totalOfPlayers).length;
  frontEndCard.textContent = totalFrontEnd.length;
  backEndCard.textContent = totalBackEnd.length;
  fullStackCard.textContent = totalFullStack.length;
};

updateDashboardCards();
