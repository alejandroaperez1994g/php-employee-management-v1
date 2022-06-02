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
  console.log(`Delete player with ID ${dataID}`);
});
