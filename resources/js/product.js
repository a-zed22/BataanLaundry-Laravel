let nextButton = document.getElementById("next");
let prevButton = document.getElementById("prev");
let carousel1 = document.querySelector(".carousel1");
let listHTML = document.querySelector(".carousel1 .list");
let seeMoreButtons = document.querySelectorAll(".seeMore");
let backButton = document.getElementById("back");

nextButton.onclick = function () {
  showSlider("next");
};
prevButton.onclick = function () {
  showSlider("prev");
};
let unAcceppClick;
const showSlider = (type) => {
  nextButton.style.pointerEvents = "none";
  prevButton.style.pointerEvents = "none";

  carousel1.classList.remove("next", "prev");
  let items = document.querySelectorAll(".carousel1 .list .item");
  if (type === "next") {
    listHTML.appendChild(items[0]);
    carousel1.classList.add("next");
  } else {
    listHTML.prepend(items[items.length - 1]);
    carousel1.classList.add("prev");
  }
  clearTimeout(unAcceppClick);
  unAcceppClick = setTimeout(() => {
    nextButton.style.pointerEvents = "auto";
    prevButton.style.pointerEvents = "auto";
  }, 2000);
};
seeMoreButtons.forEach((button) => {
  button.onclick = function () {
    carousel1.classList.remove("next", "prev");
    carousel1.classList.add("showDetail");
  };
});
backButton.onclick = function () {
  carousel1.classList.remove("showDetail");
};
