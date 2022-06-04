const deleteButtons = document.querySelectorAll("[data-delete-button]");
const trElements = document.querySelectorAll("[data-tr]");
const confirmationButton = document.getElementById("deletePlayer");
let dataID;

Array.from(trElements).map((tr) => {
  tr.addEventListener("click", (e) => {
    if (e.target.classList[1] === "fa-trash") return;
    const id = e.target.parentElement.getAttribute("data-id");
    location.href = "employee.php?id=" + id;
  });
});

Array.from(deleteButtons).map((button) => {
  button.addEventListener("click", (e) => {
    e.preventDefault();
    dataID = e.target.parentElement.getAttribute("data-id");
  });
});

confirmationButton.addEventListener("click", (e) => {
  deletePlayer(dataID);
});

const deletePlayer = (id) => {
  const response = fetch(
    "http://localhost:8080/php-employee-management-v1/src/library/employeeController.php",
    {
      method: "DELETE",
      headers: { "content-type": "application/json; chartset=UTF-8" },
      body: JSON.stringify({
        id: id,
      }),
    }
  )
    .then((response) => response.json())
    .then((data) => updateDashboard(data));
};

const deleteChildNodes = (parent) => {
  while (parent.firstChild) {
    parent.removeChild(parent.lastChild);
  }
};

const getTR = (player) => {
  const tr = document.createElement("tr");
  const tdPlayer = document.createElement("td");
  const tdNickName = document.createElement("td");
  const tdPrice = document.createElement("td");
  const tdTeam = document.createElement("td");
  const tdPosition = document.createElement("td");
  const tdAge = document.createElement("td");
  const tdNationality = document.createElement("td");
  const tdDelete = document.createElement("td");

  const deleteButton = document.createElement("a");

  const icon = document.createElement("i");

  deleteButton.setAttribute("data-delete-button", "true");
  deleteButton.setAttribute("data-id", player.id);
  deleteButton.setAttribute("data-bs-toggle", "modal");
  deleteButton.setAttribute("data-bs-target", "#confirmation-delete");
  deleteButton.setAttribute("href", "#");

  icon.classList.add("fa", "fa-trash", "text-danger");

  tdDelete.append(deleteButton);

  deleteButton.appendChild(icon);

  tdPlayer.textContent = player.player;
  tdNickName.textContent = player.nickname;
  tdPrice.textContent = player.price;
  tdTeam.textContent = player.team;
  tdPosition.textContent = player.position;
  tdAge.textContent = player.age;
  tdNationality.textContent = player.nationality;
  tr.setAttribute("data-id", player.id);
  tr.setAttribute("data-tr", "");
  tr.classList.add("dashboard-row");

  tr.appendChild(tdPlayer);
  tr.appendChild(tdNickName);
  tr.appendChild(tdPrice);
  tr.appendChild(tdTeam);
  tr.appendChild(tdPosition);
  tr.appendChild(tdAge);
  tr.appendChild(tdNationality);
  tr.appendChild(tdDelete);

  return tr;
};

const updateDashboard = (data) => {
  const dashboardBody = document.getElementById("dashboard-body");
  deleteChildNodes(dashboardBody);
  Object.values(data).map((player) => {
    dashboardBody.appendChild(getTR(player));
  });
};
