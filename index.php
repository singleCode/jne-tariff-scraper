<?php
// Start session
session_start();
// Include our JNE class
require_once('classes/JNE.php');

// Create an instance of JNE class
$jne = new JNE();
// Get JNE homepage session ID
$sessionID = $jne->getSessionID();
// Get JNE CAPTCHA for tariff cheking
$captcha = $jne->getCAPTCHA();
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>JNE Tariff Scraper</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <div class="container home">
            <h1>Search JNE Tariff</h1>
            <form method="post" action="result.php" id="form">
                <!-- Hidden fields. ========================================-->
                <input type="hidden" id="session_id" 
                    value="<?php echo $sessionID; ?>">
                <input type="hidden" name="origin_code" id="origin_code"
                    value="<?php echo $jne->old('origin_code') ?>">
                <input type="hidden" name="destination_code" 
                    id="destination_code" 
                    value="<?php echo $jne->old('destination_code') ?>">
                <input type="hidden" name="captcha_session_id" 
                    value="<?php echo $captcha['session_id']; ?>">

                <!-- FROM fields. ==========================================-->
                <div class="input-group">
                    <label for="from">From</label>
                    <input type="text" name="from" id="from"
                        value="<?php echo $jne->old('from') ?>"
                        autocomplete="off">
                </div>

                <!-- TO fields. ============================================-->
                <div class="input-group">
                    <label for="to">To</label>
                    <input type="text" name="to" id="to"
                        value="<?php echo $jne->old('to') ?>"
                        autocomplete="off">
                </div>

                <!-- WEIGHT fields. ========================================-->
                <div class="input-group">
                    <label for="weight">Weight (kgs)</label>
                    <input type="text" name="weight" id="weight"
                        value="<?php echo $jne->old('weight') ?>"
                        autocomplete="off">
                </div>

                <!-- CAPTCHA image. ========================================-->
                <div class="input-group">
                    <label>&nbsp;</label>
                    <img src="data:image/gif;base64,<?php echo $captcha['base64_img']; ?>"
                        class="captcha">
                </div>

                <!-- CAPTCHA fields. =======================================-->
                <div class="input-group">
                    <label for="captcha">CAPTCHA</label>
                    <input type="text" name="captcha" id="captcha" 
                        class="captcha-field" autocomplete="off">
                </div>

                <!-- SUBMIT button. ========================================-->
                <div class="input-group">
                    <label>&nbsp;</label>
                    <input type="submit" id="submit" value="Submit">
                </div>
            </form>
        </div>

        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="js/jquery.autocomplete.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>