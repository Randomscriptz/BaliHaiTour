<?php
/**
 * Created by PhpStorm.
 * User: Dj
 * Date: 4/6/2017
 * Time: 10:17 AM
 */

if (isset($_POST['name'])) $name = $_POST['name'];
else $name = "(not entered)";

echo <<<_END
<html>
<head>
    <title>Card &ndash; the better way to collect credit cards</title>
    <meta name="viewport" content="initial-scale=1">
    <!-- CSS is included through the card.js script -->
</head>
<body>
<style>
    .demo-container {
    width: 100%;
    max-width: 350px;
        margin: 50px auto;
    }
    form {
    margin: 30px;
    }
    input {
    width: 200px;
        margin: 10px auto;
        display: block;
    }
</style>
<div class="demo-container">
    <div class="card-wrapper"></div>

    <div class="form-container active">
        <form  method="post" action="formtest2.php">
            <input placeholder="Card number" type="tel" name="number">
            <input placeholder="Full name" type="text" name="name">
            <input placeholder="MM/YY" type="tel" name="expiry">
            <input placeholder="CVC" type="number" name="cvc">
            <input type="submit" class="submit" id="submit" value="Submit" />
        </form>
    </div>
</div>

<script src="../Secure/card.js"></script>
<script>
new Card({
    form: document.querySelector('form'),
        container: '.card-wrapper'
    });
</script>
</body>
</html>

_END;
?>