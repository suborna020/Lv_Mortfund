<form>
  <script src="https://checkout.flutterwave.com/v3.js"></script>
  <button type="button" onClick="makePayment()">Pay Now</button>
</form>
<script>
  function makePayment() {
    FlutterwaveCheckout({
      public_key: "FLWPUBK_TEST-ebdb23f5787fe40819241a13f867070f-X",
      tx_ref: "hooli-tx-1920bbtyt",
      amount: 54600,
      currency: "NGN",
      country: "NG",
      payment_options: "card, mobilemoneyghana, ussd",
      redirect_url: // specified redirect URL
        "http://127.0.0.1:8000/flutterSuccess",
      meta: {
        consumer_id: 23,
        consumer_mac: "92a3-912ba-1192a",
      },
      customer: {
        email: "saqlainsagor33334@gmail.com",
        phone_number: "08102909304",
        name: "yemi desola",
      },
      callback: function (data) {
        console.log(data);
      },
      onclose: function() {
        // close modal
      },
      customizations: {
        title: "My store",
        description: "Payment for items in cart",
        logo: "https://assets.piedpiper.com/logo.png",
      },
    });
  }
</script>




<!-- 



<form>
  <script src="https://checkout.flutterwave.com/v3.js"></script>
  <button type="button" onClick="makePayment()">Pay Now</button>
</form>
<script>
  function makePayment() {
    FlutterwaveCheckout({
      public_key: "FLWPUBK-44aec862f81c2a7d722b490e0ede6dcb-X",
      tx_ref: "hooli-tx-1920bbtyt",
      amount: 54600,
      currency: "NGN",
      country: "NG",
      payment_options: "card, mobilemoneyghana, ussd",
      redirect_url: // specified redirect URL
        "https://callbacks.piedpiper.com/flutterwave.aspx?ismobile=34",
      meta: {
        consumer_id: 23,
        consumer_mac: "92a3-912ba-1192a",
      },
      customer: {
        email: "user@gmail.com",
        phone_number: "08102909304",
        name: "yemi desola",
      },
      callback: function (data) {
        console.log(data);
      },
      onclose: function() {
        // close modal
      },
      customizations: {
        title: "My store",
        description: "Payment for items in cart",
        logo: "https://assets.piedpiper.com/logo.png",
      },
    });
  }
</script> -->