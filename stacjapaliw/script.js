const btn = document.getElementById("button");

btn.addEventListener("click", () => {
  const fuel = document.getElementById("fuel").value;
  const liters = document.getElementById("liters").value;
  const result = document.querySelector(".result");

  let price;
  if (fuel == 1) {
    price = liters * 4;
  } else if (fuel == 2) {
    price = liters * 3.5;
  } else {
    price = 0;
  }

  result.textContent = `koszt paliwa: ${price} zł`;
});
