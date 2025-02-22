const carousel = document.getElementById("carousel");
const prevButton = document.getElementById("prev-button");
const nextButton = document.getElementById("next-button");

const imageWidth = carousel.offsetWidth / 3;
let currentIndex = 0;

prevButton.addEventListener("click", function() {
  currentIndex = Math.max(currentIndex - 1, 0);
  carousel.style.transform = `translateX(-${currentIndex * imageWidth}px)`;
});

nextButton.addEventListener("click", function() {
  const numImages = carousel.children.length;
  currentIndex = Math.min(currentIndex + 1, numImages - 3);
  carousel.style.transform = `translateX(-${currentIndex * imageWidth}px)`;
});

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}