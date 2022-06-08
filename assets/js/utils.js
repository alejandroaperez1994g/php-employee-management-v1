import { updateDashboard } from "./index.js";

const addNewRow = () => {
  const dashboardTable = document.getElementById("dashboard-body");

  const trElement = getSpecialRow();
  dashboardTable.insertBefore(trElement, dashboardTable.firstChild);

  const buttonCancel = document.getElementById("button-cancel");
  const buttonAdd = document.getElementById("button-add");

  buttonCancel.addEventListener("click", () => {
    dashboardTable.removeChild(dashboardTable.firstChild);
  });
  buttonAdd.addEventListener("click", (e) => {
    e.preventDefault();
    const playerName = document.getElementById("input-player").value;
    const playerNickname = document.getElementById("input-nickname").value;
    const playerPrice = document.getElementById("input-price").value;
    const playerTeam = document.getElementById("select-team");
    const playerTeamChoice = playerTeam.options[playerTeam.selectedIndex].text;
    const playerPosition = document.getElementById("select-position");
    const playerPositionChoice =
      playerPosition.options[playerPosition.selectedIndex].text;
    const playerAge = document.getElementById("input-age").value;

    const playerNationality = document.getElementById("select-nationality");
    const playerNationChoice =
      playerNationality.options[playerNationality.selectedIndex].text;
    //TODO comunicar con PHP y pasarle estos datos para agregarlos

    const playerInfo = {
      player: playerName,
      nickname: playerNickname,
      price: playerPrice,
      team: playerTeamChoice,
      position: playerPositionChoice,
      age: playerAge,
      nationality: playerNationChoice,
    };
    addPlayerByTable(playerInfo);
  });
};

const getSpecialRow = () => {
  const trElement = document.createElement("tr");
  const tdPlayer = document.createElement("td");
  const tdNickName = document.createElement("td");
  const tdPrice = document.createElement("td");
  const tdTeam = document.createElement("td");
  const tdPosition = document.createElement("td");
  const tdAge = document.createElement("td");
  const tdNationality = document.createElement("td");
  const tdAddPlayer = document.createElement("td");

  const inputPlayer = document.createElement("input");
  inputPlayer.setAttribute("type", "text");
  inputPlayer.id = "input-player";
  inputPlayer.setAttribute("placeholder", "PLAYER NAME");
  inputPlayer.classList.add("form-control");
  tdPlayer.append(inputPlayer);

  const inputNickName = document.createElement("input");
  inputNickName.setAttribute("type", "text");
  inputNickName.id = "input-nickname";
  inputNickName.setAttribute("placeholder", "NICKNAME");
  inputNickName.classList.add("form-control");
  tdNickName.append(inputNickName);

  const inputPrice = document.createElement("input");
  inputPrice.setAttribute("type", "text");
  inputPrice.id = "input-price";
  inputPrice.setAttribute("placeholder", "KIT NUMBER");
  inputPrice.classList.add("form-control");
  tdPrice.append(inputPrice);

  const selectTeam = document.createElement("select");
  selectTeam.id = "select-team";
  const optionFront = document.createElement("option");
  const optionEnd = document.createElement("option");
  const optionFull = document.createElement("option");
  optionFront.textContent = "FRONTEND";
  optionFront.value = "FRONTEND";
  optionEnd.textContent = "BACKEND";
  optionEnd.value = "BACKEND";
  optionFull.textContent = "FULLSTACK";
  optionFull.value = "FULLSTACK";
  selectTeam.classList.add("form-select");
  selectTeam.append(optionFront, optionEnd, optionFull);
  tdTeam.append(selectTeam);

  const selectPosition = document.createElement("select");
  selectPosition.id = "select-position";
  const optionGoal = document.createElement("option");
  const optionDef = document.createElement("option");
  const optionMid = document.createElement("option");
  const optionFor = document.createElement("option");
  const optionCenter = document.createElement("option");
  const optionWing = document.createElement("option");
  optionGoal.textContent = "GOALKEEPER";
  optionDef.textContent = "DEFENDER";
  optionMid.textContent = "MIDFIELDER";
  optionFor.textContent = "FORWARD";
  optionCenter.textContent = "CENTERBACK";
  optionWing.textContent = "WINGBACK";

  selectPosition.classList.add("form-select");
  selectPosition.append(
    optionGoal,
    optionDef,
    optionMid,
    optionFor,
    optionCenter,
    optionWing
  );
  tdPosition.append(selectPosition);

  const inputAge = document.createElement("input");
  inputAge.id = "input-age";
  inputAge.setAttribute("type", "text");
  inputAge.setAttribute("placeholder", "AGE");
  inputAge.classList.add("form-control");
  tdAge.append(inputAge);

  const selectNationality = document.createElement("select");
  selectNationality.id = "select-nationality";
  const optionArgentina = document.createElement("option");
  const optionBrazil = document.createElement("option");
  const optionSpain = document.createElement("option");
  const optionUsa = document.createElement("option");
  const optionCub = document.createElement("option");
  const optionVen = document.createElement("option");
  const optionFran = document.createElement("option");
  const optionRuss = document.createElement("option");
  const optionBel = document.createElement("option");
  const optionIsr = document.createElement("option");
  const optionPort = document.createElement("option");
  optionArgentina.textContent = "ARGENTINA";
  optionBrazil.textContent = "BRAZIL";
  optionSpain.textContent = "SPAIN";
  optionUsa.textContent = "USA";
  optionCub.textContent = "CUBA";
  optionVen.textContent = "VENEZUELA";
  optionFran.textContent = "FRANCE";
  optionRuss.textContent = "RUSSIA";
  optionBel.textContent = "BELARUS";
  optionIsr.textContent = "ISRAEL";
  optionPort.textContent = "PORTUGAL";

  selectNationality.classList.add("form-select");
  selectNationality.append(
    optionArgentina,
    optionBrazil,
    optionSpain,
    optionUsa,
    optionCub,
    optionVen,
    optionFran,
    optionRuss,
    optionBel,
    optionIsr,
    optionPort
  );
  tdNationality.append(selectNationality);

  const buttonCancel = document.createElement("i");
  buttonCancel.classList.add("fa-solid", "fa-user-slash");
  buttonCancel.id = "button-cancel";
  const buttonAdd = document.createElement("i");
  buttonAdd.classList.add("fa-solid", "fa-user-plus");
  buttonAdd.id = "button-add";

  tdAddPlayer.append(buttonCancel, buttonAdd);
  tdAddPlayer.classList.add("action__buttons");

  trElement.classList.add("dashboard-row");
  trElement.id = "special-row";
  trElement.append(
    tdPlayer,
    tdNickName,
    tdPrice,
    tdTeam,
    tdPosition,
    tdAge,
    tdNationality,
    tdAddPlayer
  );

  return trElement;
};

const addPlayerByTable = (data) => {
  const response = fetch(
    "http://localhost:8080/php-employee-management-v1/src/library/employeeController.php?add_player_table",
    {
      method: "POST",
      headers: { "content-type": "application/json; chartset=UTF-8" },
      body: JSON.stringify({
        player: data.player,
        nickname: data.nickname,
        price: data.price,
        team: data.team,
        position: data.position,
        age: data.age,
        nationality: data.nationality,
      }),
    }
  )
    .then((response) => response.json())
    .then((data) => updateDashboard(data));
};

export { addNewRow };
