/* Regular function */
function myFunction1(e) {
  replaceWhoWithName(e.getAttribute("name"));
};

/* Arrow function */
const myFunction2 = (e) => {
  replaceWhoWithName(e.getAttribute("name"));
};

/* Replace function */

const replaceWhoWithName = (name) => {
  document.getElementById("who").innerHTML = name;
};

const replaceImageSource = () => {

      element = document.getElementById("lightning-mcqueen");
      element.src = "https://upload.wikimedia.org/wikipedia/en/8/82/Lightning_McQueen.png";

};
