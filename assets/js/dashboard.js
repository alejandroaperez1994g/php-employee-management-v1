const { data } = require("jquery");

//*get all data from .json file employees.json
const getAllData = async () => {
  const response = await fetch("../../resources/employees.json");
  const data = await response.json(); //* converts the response to json
  return data;
};

const updateDashboard = async () => {
  const totalPlayer = document.getElementById("total-players");
  const frontEndCard = document.getElementById("frontend");
  const backEndCard = document.getElementById("backend");
  const fullStackCard = document.getElementById("fullstack");

  const totalOfPlayers = await getAllData();

  const totalFrontEnd = totalOfPlayers.filter(
    (player) => player.team === "FRONTEND"
  );
  const totalBackEnd = totalOfPlayers.filter(
    (player) => player.team === "BACKEND"
  );
  const totalFullStack = totalOfPlayers.filter(
    (player) => player.team === "FULLSTACK"
  );

  //*set the lenght of respective players teams
  totalPlayer.textContent = totalOfPlayers.length;
  frontEndCard.textContent = totalFrontEnd.length;
  backEndCard.textContent = totalBackEnd.length;
  fullStackCard.textContent = totalFullStack.length;
};

updateDashboard();
