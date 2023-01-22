const img = document.querySelector(".photo");

let on = true;
img.addEventListener("click", () => {
  if (on) {
    img.src = "icon-off.png";
    on = false;
  } else {
    img.src = "icon-on.png";
    on = true;
  }
});
