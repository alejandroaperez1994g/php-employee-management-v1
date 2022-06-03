const deleteButtons = document.querySelectorAll("[data-delete-button]");
const confirmationButton = document.getElementById("deletePlayer");
let dataID;

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

const updateDashboard = (data) => {};
