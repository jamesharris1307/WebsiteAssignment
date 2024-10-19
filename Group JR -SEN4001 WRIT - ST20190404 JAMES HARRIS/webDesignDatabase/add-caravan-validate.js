//Declare Variables
const make = document.getElementById("make");
const model = document.getElementById("model");
const bodyType = document.getElementById("bodyType");
const fuelType = document.getElementById("fuelType");
const mileage = document.getElementById("mileage");

//   ¯\_(ツ)_/¯
/* Error (Location has already been declared) */
const locationInput = document.getElementById("location");
/* Full Error Message:
Uncaught SyntaxError: Identifier 'location' has already been declared (at add-caravan-validate.js:1:1)  
/* Don't understand why this is the case. Can't see the location being declared on this file.
But the code works none the less So Task Failed Successfully I Guess.

Error Resolved - 
*/

const year = document.getElementById("year");
const numDoors = document.getElementById("numDoors");
const image = document.getElementById("image");

const form = document.querySelector("form");
const errorElement = document.getElementById("error");
const IR = " Is Required";

//Event Listener
form.addEventListener("submit", (e) => {
  let messages = [];

  // Error Checks
  if (make.value === "" || make.value == null) {
    messages.push("Make" + IR);
  } else if (model.value === "" || model.value == null) {
    messages.push("Model" + IR);
  } else if (bodyType.value === "" || bodyType.value == null) {
    messages.push("BodyType" + IR);
  } else if (fuelType.value === "" || fuelType.value == null) {
    messages.push("FuelType" + IR);
  } else if (mileage.value === "" || mileage.value == null) {
    messages.push("Mileage" + IR);
  } else if (locationInput.value === "" || locationInput.value == null) {
    messages.push("Location" + IR);
  } else if (year.value === "" || year.value == null) {
    messages.push("Year" + IR);
  } else if (numDoors.value === "" || numDoors.value == null) {
    messages.push("Number of Doors" + IR);
  } else if (image.value === "" || image.value == null) {
    messages.push("Image" + IR);
  }

  //If Errors are Found
  if (messages.length > 0) {
    e.preventDefault();
    errorElement.innerText = messages.join(" ");
  }
});
