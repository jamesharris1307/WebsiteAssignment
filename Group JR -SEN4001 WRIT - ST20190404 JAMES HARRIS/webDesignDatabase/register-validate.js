//Declare Variables
const firstName = document.getElementById("firstName");
const lastName = document.getElementById("lastName");
const dateBirth = document.getElementById("dateBirth");
const email = document.getElementById("email");
const username = document.getElementById("username");
const password = document.getElementById("password");
const verifyPassword = document.getElementById("verifyPassword");
const form = document.querySelector("form");
const errorElement = document.getElementById("error");
const IR = " Is Required";

//Event Listener
form.addEventListener("submit", (e) => {
  let messages = [];

  // Error Checks
  if (firstName.value === "" || firstName.value == null) {
    messages.push("First Name" + IR);
  } else if (lastName.value === "" || lastName.value == null) {
    messages.push("Last Name " + IR);
  } else if (dateBirth.value === "" || dateBirth.value == null) {
    messages.push("Date of Birth" + IR);
  } else if (!dateBirth.valueAsDate) {
    messages.push("Not a Valid Date");
  } else if (email.value === "" || email.value == null) {
    messages.push("Email" + IR);
  } else if (email.value.indexOf("@") === -1) {
    messages.push("For Email '@'" + IR);
  } else if (username.value === "" || username.value == null) {
    messages.push("Username" + IR);
  } else if (password.value === "" || password.value == null) {
    messages.push("Password" + IR);
  } else if (password.value.length <= 8) {
    messages.push("Password is too Short");
  } else if (verifyPassword.value === "" || verifyPassword.value == null) {
    messages.push("Verify Password" + IR);
  } else if (verifyPassword.value !== password.value) {
    messages.push("Passwords Don't Match");
  }

  // If Error(s) Found
  if (messages.length > 0) {
    e.preventDefault();
    errorElement.innerText = messages.join(" ");
  }
});
