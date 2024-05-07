<?php
include '../Controller/UtilisateurC.php';

$captcha_error = ''; // Initialise la variable captcha_error

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifiez le captcha ici
    $selectedImages = isset($_POST['selected_images']) ? $_POST['selected_images'] : [];
    $selectedRedImages = array_filter($selectedImages, function($image) {
        return strpos($image, 'red') !== false;
    });
    if (count($selectedRedImages) !== 2) {
        $captcha_error = 'Captcha verification failed';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password']) && empty($captcha_error)) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userC = new UtilisateurC();
    $userC->loginUser($email, $password);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../front/style.css">
    <link rel="stylesheet" href="../front/login.css">
</head>
<body>
    <div class="container login-container">
        <div class="box form-box">
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="field input password-input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
                <h2>Choose all the red pictures</h2>
                <div class="images-container">
                    <input type="hidden" name="selected_images[]" id="image1" value="">
                    <input type="hidden" name="selected_images[]" id="image2" value="">
                    <img class="image" src="image/red0.jpg" alt="Image rouge" onclick="selectImage('red0')">
                    <img class="image" src="image/blue0.jpg" alt="Image bleue" onclick="selectImage('blue0')">
                    <img class="image" src="image/red1.jpg" alt="Image rouge" onclick="selectImage('red1')">
                    <img class="image" src="image/green0.jpg" alt="Image verte" onclick="selectImage('green0')">
                </div>
                <div class="g-recaptcha" data-sitekey="6LeKk9EpAAAAAA6Ry3tSSBu4Rxsz_3wLbxe-ovVF"></div>
                <div style="color: red;"><?php echo $captcha_error; ?></div>
                <button type="submit" class="bnt" name="submit">Login</button>
                
                <div class="links">
                    Don't have an account? <a href="register.php">Sign up Now</a><br>
                    Forgot Password <a href="../View/forgot_password.html">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        let selectedImages = [];

        function selectImage(color) {
            const imageInput1 = document.getElementById('image1');
            const imageInput2 = document.getElementById('image2');
            const imageElement = document.querySelector('.image[src$="' + color + '.jpg"]');
            if (selectedImages.includes(color)) {
                selectedImages = selectedImages.filter(img => img !== color);
                imageElement.style.border = '2px solid transparent';
            } else {
                if (selectedImages.length < 2) {
                    selectedImages.push(color);
                    imageElement.style.border = '2px solid red';
                }
            }
            imageInput1.value = selectedImages[0] || '';
            imageInput2.value = selectedImages[1] || '';
        }

        function validateCaptcha() {
            const redImages = document.querySelectorAll('.image[src$="red.jpg"].selected');
            if (redImages.length === 2) {
                document.getElementById('result').innerText = 'Captcha validé !';
            } else {
                document.getElementById('result').innerText = 'Captcha invalide. Veuillez sélectionner les images rouges.';
            }
        }
    </script>
</body>
</html>
