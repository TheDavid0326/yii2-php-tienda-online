document.addEventListener("DOMContentLoaded", function() {
  
  const stripe = Stripe('pk_test_51RCOdg4UiTf8rdcB1ikPCWvHOXJBpGAzj4X9BdGLCDzMKRsyjNPRTHxABNk9y7ebK6ZPjT5hcSimYYnB6CoNuiAy00KQyiEu8n');

  const appearance = {
    theme: 'night',
    variables: {
      colorPrimary: '#7b0a8a',
    },
  };
  
  // Asegúrate de que 'clientSecret' está definido correctamente
  const elements = stripe.elements({ clientSecret, appearance });

  // Crear el Payment Element (formulario de pago)
  const paymentElement = elements.create("payment");

  // Montarlo en el contenedor con id 'payment-element'
  paymentElement.mount("#payment-element");

  // Obtener el formulario y añadir el evento de submit
const form = document.getElementById("payment-form");

let checkout = {
  updateEmail: (email) => {
      return { type: "success" }; // Simulación de respuesta
  }
};

initialize();


// Función para validar el email
const validateEmail = async (email) => {
  const updateResult = await checkout.updateEmail(email);
  const isValid = updateResult.type !== "error";

  return { isValid, message: !isValid ? updateResult.error.message : null };
};

document
  .querySelector("#payment-form")
  .addEventListener("submit", handleSubmit);

async function initialize() {

  document.querySelector("#button-text").textContent = `Pay ${
    totalAmount
  }€ now`;
  
  const emailInput = document.getElementById("email");
  const emailErrors = document.getElementById("email-errors");

  emailInput.addEventListener("input", () => {
    // Clear any validation errors
    emailErrors.textContent = "";
  });

  emailInput.addEventListener("blur", async () => {
    const newEmail = emailInput.value;
    if (!newEmail) {
      return;
    }

    const { isValid, message } = await validateEmail(newEmail);
    if (!isValid) {
      emailErrors.textContent = message;
    }
  });

  const { error } = await stripe.confirmPayment({
    elements,
    confirmParams: {
      return_url: returnUrl,
    },
  });
}

async function handleSubmit(e) {
  e.preventDefault();
  setLoading(true);

  const email = document.getElementById("email").value;
  const { isValid, message } = await validateEmail(email);

  // Guarda el email en el almacenamiento local para luego usarlo en success.js
  sessionStorage.setItem("checkoutEmail", email);

  if (!isValid) {
    showMessage(message);
    setLoading(false);
    return;
  }

  
    // Confirma el pago con el 'PaymentIntent' y el 'clientSecret'
    const { error, paymentIntent } = await stripe.confirmPayment({
      elements,
      confirmParams: {
        return_url: returnUrl, // Esta es la URL de retorno después de la confirmación del pago
      },
    });

  // This point will only be reached if there is an immediate error when
  // confirming the payment. Otherwise, your customer will be redirected to
  // your `return_url`. For some payment methods like iDEAL, your customer will
  // be redirected to an intermediate site first to authorize the payment, then
  // redirected to the `return_url`.
  showMessage(error.message);

  setLoading(false);
}

// ------- UI helpers -------

function showMessage(messageText) {
  const messageContainer = document.querySelector("#payment-message");

  messageContainer.classList.remove("hidden");
  messageContainer.textContent = messageText;

  setTimeout(function () {
    messageContainer.classList.add("hidden");
    messageContainer.textContent = "";
  }, 4000);
}

// Show a spinner on payment submission
function setLoading(isLoading) {
  if (isLoading) {
    // Disable the button and show a spinner
    document.querySelector("#submit").disabled = true;
    document.querySelector("#spinner").classList.remove("hidden");
    document.querySelector("#button-text").classList.add("hidden");
  } else {
    document.querySelector("#submit").disabled = false;
    document.querySelector("#spinner").classList.add("hidden");
    document.querySelector("#button-text").classList.remove("hidden");
  }
}
  
});

