//Movement Animation to happen
const card = document.querySelector(".card");
const container = document.querySelector(".container");
//Items
const back = document.querySelector(".back");
const pad = document.querySelector(".pad");
const padButtons = document.querySelector(".pad-buttons");
const mthw = document.querySelector(".mthw");
const button = document.querySelector(".button");

//Moving Animation Event
container.addEventListener("mousemove", (e) => {
  let xAxis = (window.innerWidth / 2 - e.pageX) / 25;
  let yAxis = -(window.innerHeight / 2 - e.pageY) / 25;
  card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
});
//Animate In
container.addEventListener("mouseenter", (e) => {
  card.style.transition = "none";
  //Popout
  back.style.transform = "translateZ(100px)";
  padButtons.style.transform = "translateZ(250px)";
  pad.style.transform = "translateZ(200px)";
  mthw.style.transform = "translateZ(125px)";
  button.style.transform = "translateZ(75px)";
});
//Animate Out
container.addEventListener("mouseleave", (e) => {
  card.style.transition = "all 0.5s ease";
  card.style.transform = `rotateY(0deg) rotateX(0deg)`;
  //Popback
  back.style.transform = "translateZ(0px)";
  pad.style.transform = "translateZ(0px) rotateZ(0deg)";
  padButtons.style.transform = "translateZ(0px)";
  mthw.style.transform = "translateZ(0px)";
  button.style.transform = "translateZ(0px)";
});
