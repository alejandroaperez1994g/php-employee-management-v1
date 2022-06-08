const mainPath = `${window.location.origin}/php-employee-management-v1/`;

//* get the time from the session storage and calculate the time difference
const checkTime = () => {
  const firstTime = sessionStorage.getItem("time");
  const currentTime = new Date().getTime();
  const min = Math.floor((currentTime - firstTime) / 60000);
  return min;
};

//* 5- call the logout php function that destroy de cookies and session
const setAutomaticLogout = () => {
  const response = fetch(
    "http://localhost:8080/php-employee-management-v1/src/library/loginController.php",
    {
      method: "LOGOUT",
      headers: { "content-type": "application/json; chartset=UTF-8" },
    }
  )
    .then((response) => response.json())
    .then((data) => console.log("automatic logout"));
};

//* 3- set the interval to check the time
const interval = setInterval(() => {
  const time = checkTime();
  stopInterval(time);
}, 10000);

//* 4- stop the interval if the time is greater than 10 minutes
const stopInterval = (min) => {
  if (min >= 30) {
    clearInterval(interval);
    sessionStorage.removeItem("time");
    setAutomaticLogout();
    location.assign(`${mainPath}`);
  }
};

//* 2- check if is set the current time in the session Storage, if not it will set the current time
const automaticLogout = () => {
  if (!sessionStorage.getItem("time")) {
    sessionStorage.setItem("time", new Date().getTime());
  } else {
    interval;
  }
};

//* 1- set automatic check when the page is loaded
window.addEventListener("load", () => {
  automaticLogout();
});

export { automaticLogout };
