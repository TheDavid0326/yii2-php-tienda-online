initialize();

async function initialize() {
  const email = sessionStorage.getItem("checkoutEmail");
  console.log("Email recuperado:", email);
  document.getElementById("customer-email").textContent = email;
}