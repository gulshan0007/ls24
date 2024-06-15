// single
const svg = document.querySelector("svg");
const computer = document.getElementById("computer");
const computerBase = document.getElementById("computerBase");
const booksTable = document.querySelector("#booksTable");
const clock = document.getElementById("clock");
const lampSupport = document.getElementById("lampSupport")
const calendar = document.getElementById("calendar");
const frame = document.getElementById("frame");
const desk = document.getElementById("desk");
const light = document.getElementById("light");

// array
const lamp = document.querySelectorAll("#lamp > path");
const books = document.querySelectorAll("#books > path");
const pens = document.querySelectorAll("#pens > path");
const camera = document.querySelectorAll("#camera > path");
const coffee = document.querySelectorAll(".coffee");
const coffeeSmoke = document.querySelectorAll(".coffee-smoke");

const tl = new TimelineMax({});

tl
  .to(svg, 0, { opacity: 1 })
  .add("table", "-=0.2")
  .from(desk, .5, {
    scale: 0,
    y: 100,
    transformOrigin: "center bottom"
  })
  .staggerFrom(camera, .5, {
    opacity: 0,
    y: 50,
    ease: Back.easeIn
  }, .05, "table+=.5")
  .staggerFrom(pens, .5, {
    opacity: 0,
    y: 50,
    ease: Back.easeIn
  }, .05, "table+=1")
  .staggerFrom(coffee, .5, {
    opacity: 0,
    y: 50
  }, .05, "table+=1.5")
  .staggerFrom(coffeeSmoke, .5, {
    scale: 0,
    transformOrigin: "center top"
  }, .05)
  .add("booksTable", "-=0.5")
  .from(booksTable, .5, {
    scale: 0,
    y: 100,
    transformOrigin: "center bottom"
  })
  .staggerFrom(books, .5, {
    opacity: 0,
    y: 50,
    ease: Back.easeIn
  }, .05)
  .from(frame, .2, {
    opacity: 0,
    scale: .8,
    transformOrigin: "center bottom"
  })
  .to(frame, .2, { rotation: 5 }, "booksTable")
  .to(frame, .2, { rotation: -5 })
  .to(frame, .2, { rotation: 2 })
  .to(frame, .2, { rotation: -2 })
  .to(frame, .2, { rotation: 0 })
  .from(clock, 2, {
    opacity: 0,
    scale: .8,
    ease: Elastic.easeIn,
    transformOrigin: "center center"
  }, "booksTable")
  .from(calendar, .5, {
    x: 100,
    opacity: 0
  }, "booksTable")
    .add("computer", "-=0.1")
    .from(computer, .5, {
    x: 100,
    opacity: 0
  })
  .from(computerBase, .5, {
    x: 100,
    opacity: 0
  }, "computer")
    .add("lamp", "-=0.2")
    .staggerFrom(lamp, .5, {
    opacity: 0,
    scale: 0
  }, .05)
  .from(lampSupport, .5, {
    opacity: 0,
    transformOrigin: "left top",
    rotation: -45
  }, "lamp")
  .from(light, 1, {
    opacity: 0,
    ease: Bounce.easeIn,
    delay: .5
  });
