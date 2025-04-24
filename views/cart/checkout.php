
  <head>
    <meta charset="utf-8" />
    <title>Accept a payment</title>
    <meta name="description" content="A demo of a payment on Stripe" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="<?php echo Yii::getAlias('@web/css/checkout.css') ?>" />
    <script src="<?= Yii::getAlias('@web/js/checkout.js') ?>" defer></script> <!-- defer: el script se descarga en paralelo pero se ejecuta al final, después de que el DOM esté listo. -->
    <script src="https://js.stripe.com/basil/stripe.js" defer></script>

    <!-- Inicializamos clientSecret y returnUrl en JavaScript para poder usarlo desde el navegador, es decir en el frontend con un archivo JavaScript o un script -->
    <script>
      const clientSecret = "<?= $clientSecret ?>";
      const totalAmount = <?= json_encode((float)$totalAmount) ?>;
      const returnUrl = "<?= $returnUrl ?>";
    </script>
  </head>

  <body>
    <div class="form-wrapper">
      <!-- Display a payment form -->
      <form id="payment-form">
        <label>
          Email
          <input type="text" id="email" placeholder="you@example.com"
        /></label>
        <div type="text" id="email-errors"></div>
        <h4>Payment</h4>
        <div id="payment-element">
          <!--Stripe.js injects the Payment Element-->
        </div>
        <button id="submit">
          <div class="spinner hidden" id="spinner"></div>
          <span id="button-text">Pay now</span>
        </button>
        <div id="payment-message" class="hidden"></div>
      </form>
    </div>
  </body>
</html>