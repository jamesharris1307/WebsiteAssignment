//Declare Variables
const username = document.getElementById("username");
const password = document.getElementById("password");
const form = document.querySelector("form");
const errorElement = document.getElementById("error");
const IR = " Is Required";

//Event Listener
form.addEventListener("submit", (e) => {
  let messages = [];

  // Error Checks
  if (username.value === "" || username.value == null) {
    messages.push("Username" + IR);
  } else if (password.value === "" || username.value == null) {
    messages.push("Password" + IR);
  }

  // If Error(s) Found
  if (messages.length > 0) {
    e.preventDefault();
    errorElement.innerText = messages.join(" ");
  }
});
