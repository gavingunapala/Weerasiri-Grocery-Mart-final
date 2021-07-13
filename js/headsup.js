//Selecting elements from DOM
const error = document.querySelector(".error");
const success = document.querySelector(".success");

//Checking if it is error or success
if (error != null) {
  setTimeout(() => {
    error.style.display = "none";
  }, 4000);
} else if (success != null) {
  setTimeout(() => {
    success.style.display = "none";
  }, 4000);
}
