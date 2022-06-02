const getAllData = async () => {
  const response = await fetch("../../resources/employees.json");
  const data = await response.json();
  return data;
};

const updateDashboard = async () => {
  const totalPlayer = document.getElementById("total-players");
  const frontEndCard = document.getElementById("frontend");
  const backEndCard = document.getElementById("backend");
  const fullStackCard = document.getElementById("fullstack");

  const data = await getAllData();

  const totalFrontEnd = data.filter((player) => player.team === "FRONTEND");
  const totalBackEnd = data.filter((player) => player.team === "BACKEND");
  const totalFullStack = data.filter((player) => player.team === "FULLSTACK");

  totalPlayer.textContent = data.length;
  frontEndCard.textContent = totalFrontEnd.length;
  backEndCard.textContent = totalBackEnd.length;
  fullStackCard.textContent = totalFullStack.length;
};

updateDashboard();
