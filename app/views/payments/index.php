<html>

<head>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/style.css">
</head>

<body>
    <div id="payment-form" class="container">
        <div class="py-3">
            <div id="error-message"></div>
            <form id="frmStripePayment" action="<?php echo URLROOT ?>/payments/index" method="post">
                <div class="field-row">
                    <label>Card Holder Name</label> <span id="card-holder-name-info" class="info"></span><br>
                    <input type="text" id="name" name="name" class="demoInputBox">
                </div>
                <div class="field-row">
                    <label>Email</label> <span id="email-info" class="info"></span><br> <input type="text" id="email" name="email" class="demoInputBox">
                </div>
                <div class="field-row">
                    <label>Card Number</label> <span id="card-number-info" class="info"></span><br> <input type="text" id="card-number" name="card-number" class="demoInputBox">
                </div>
                <div class="field-row">
                    <div class="contact-row column-right">
                        <label>Expiry Month / Year</label> <span id="userEmail-info" class="info"></span><br>
                        <select name="month" id="month" class="demoSelectBox">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select> <select name="year" id="year" class="demoSelectBox">
                            <option value="20">2020</option>
                            <option value="21">2021</option>
                            <option value="22">2022</option>
                            <option value="23">2023</option>
                            <option value="24">2024</option>
                            <option value="25">2025</option>
                            <option value="26">2026</option>
                            <option value="27">2027</option>
                            <option value="28">2028</option>
                            <option value="29">2029</option>
                            <option value="30">2030</option>
                            <option value="21">2031</option>
                            <option value="22">2032</option>
                            <option value="23">2033</option>
                            <option value="24">2034</option>
                            <option value="25">2035</option>
                            <option value="26">2036</option>
                            <option value="27">2037</option>
                            <option value="28">2038</option>
                            <option value="29">2039</option>
                            <option value="30">2040</option>
                        </select>
                    </div>
                    <div class="contact-row cvv-box">
                        <label>CVC</label> <span id="cvv-info" class="info"></span><br> <input type="text" name="cvc" id="cvc" class="demoInputBox cvv-input">
                    </div>
                </div>
                <div>
                    <input type="submit" name="pay_now" value="Payer" id="submit-btn" class="btnAction" onClick="stripePay(event);">

                    <div id="loader">
                        <img alt="loader" src="<?php echo URLROOT ?>/img/LoaderIcon.gif">
                    </div>
                </div>
                <input type='hidden' name='amount' value='0.5'> <input type='hidden' name='currency_code' value='EUR'> <input type='hidden' name='item_name' value='Test Product'>
                <input type='hidden' name='item_number' value='PHPPOTEG#1'>
            </form>
            <div class="test-data py-3">
                <h3>Test Card Information</h3>
                <p class="py-3">Use these test card numbers with valid expiration month
                    / year and CVC code for testing with this demo.</p>
                <table class="tutorial-table" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <th>CARD NUMBER</th>
                        <th>BRAND</th>
                    </tr>
                    <tr>
                        <td>4242424242424242</td>
                        <td>Visa</td>
                    </tr>
                    <tr>
                        <td>4000056655665556</td>
                        <td>Visa (debit)</td>
                    </tr>

                    <tr>
                        <td>5555555555554444</td>
                        <td>Mastercard</td>
                    </tr>

                    <tr>
                        <td>5200828282828210</td>
                        <td>Mastercard (debit)</td>
                    </tr>

                    <tr>
                        <td>378282246310005</td>
                        <td>American Express</td>
                    </tr>

                    <tr>
                        <td>6011111111111117</td>
                        <td>Discover</td>
                    </tr>

                    <tr>
                        <td>30569309025904</td>
                        <td>Diners Club</td>
                    </tr>

                    <tr>
                        <td>3566002020360505</td>
                        <td>JCB</td>
                    </tr>
                    <tr>
                        <td>6200000000000005</td>
                        <td>UnionPay</td>
                    </tr>

                </table>
            </div>
        </div>

    </div>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <!-- <script src="vendor/jquery/jquery-3.2.1.min.js"
        type="text/javascript"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script>
        function cardValidation() {
            var valid = true;
            var name = $('#name').val();
            var email = $('#email').val();
            var cardNumber = $('#card-number').val();
            var month = $('#month').val();
            var year = $('#year').val();
            var cvc = $('#cvc').val();

            $("#error-message").html("").hide();

            if (name.trim() == "") {
                valid = false;
            }
            if (email.trim() == "") {
                valid = false;
            }
            if (cardNumber.trim() == "") {
                valid = false;
            }

            if (month.trim() == "") {
                valid = false;
            }
            if (year.trim() == "") {
                valid = false;
            }
            if (cvc.trim() == "") {
                valid = false;
            }

            if (valid == false) {
                $("#error-message").html("All Fields are required").show();
            }

            return valid;
        }
        //set your publishable key
        Stripe.setPublishableKey("<?php echo STRIPE_PUBLISHABLE_KEY; ?>");

        //callback to handle the response from stripe
        function stripeResponseHandler(status, response) {
            if (response.error) {
                //enable the submit button
                $("#submit-btn").show();
                $("#loader").css("display", "none");
                //display the errors on the form
                $("#error-message").html(response.error.message).show();
            } else {
                //get token id
                var token = response['id'];
                //insert the token into the form
                $("#frmStripePayment").append("<input type='hidden' name='token' value='" + token + "' />");
                //submit form to the server
                $("#frmStripePayment").submit();
            }
        }

        function stripePay(e) {
            e.preventDefault();
            var valid = cardValidation();

            if (valid == true) {
                $("#submit-btn").hide();
                $("#loader").css("display", "inline-block");
                Stripe.createToken({
                    number: $('#card-number').val(),
                    cvc: $('#cvc').val(),
                    exp_month: $('#month').val(),
                    exp_year: $('#year').val()
                }, stripeResponseHandler);

                //submit from callback
                return false;
            }
        }
    </script>
</body>

</html>