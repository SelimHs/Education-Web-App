function validateForm(event) {
    var Surname = document.getElementById("Surname").value.trim();
    var FirstName = document.getElementById("FirstName").value.trim();
    var Password = document.getElementById("Password").value.trim();
    var PasswordC = document.getElementById("PasswordC").value.trim();
    var Email = document.getElementById("Email").value.trim();
    var Tel = document.getElementById("Tel").value.trim();
    var isValid = true;

    // Validation du Surname
    if (Surname === "") {
        isValid = false;
        document.getElementById("errorSurname").innerHTML = "Please fill in the Surname field.";
    } else {
        document.getElementById("errorSurname").innerHTML = "";
    }

    // Validation du FirstName
    if (FirstName === "") {
        isValid = false;
        document.getElementById("errorFirstName").innerHTML = "Please fill in the FirstName field.";
    } else {
        document.getElementById("errorFirstName").innerHTML = "";
    }

    // Validation du password
    if (Password === "") {
        isValid = false;
        document.getElementById("errorPassword").innerHTML = "Please fill in the Password field.";
    } else if (Password.length < 6 || Password.length > 10) {
        isValid = false;
        document.getElementById("errorPassword").innerHTML = "Password must be between 6 and 10 characters.";
    } else if (!/\d/.test(Password)) {
        isValid = false;
        document.getElementById("errorPassword").innerHTML = "Password must contain at least one digit.";
    } else {
        document.getElementById("errorPassword").innerHTML = "";
    }

    // Validation de la confirmation du Password
    if (PasswordC === "") {
        isValid = false;
        document.getElementById("errorPasswordC").innerHTML = "Please fill in the Password Confirmation field.";
    } else if (Password !== PasswordC) {
        isValid = false;
        document.getElementById("errorPasswordC").innerHTML = "Passwords do not match.";
    } else {
        document.getElementById("errorPasswordC").innerHTML = "";
    }

    // Validation du Email
    if (Email === "") {
        isValid = false;
        document.getElementById("errorEmail").innerHTML = "Please fill in the Email field.";
    } else if (!/\S+@\S+\.\S+/.test(Email)) {
        isValid = false;
        document.getElementById("errorEmail").innerHTML = "Please enter a valid email address.";
    } else {
        document.getElementById("errorEmail").innerHTML = "";
    }

    // Validation du Tel
    if (Tel === "") {
        isValid = false;
        document.getElementById("errorTel").innerHTML = "Please fill in the Tel field.";
    } else if (!/^\d{8}$/.test(Tel)) {
        isValid = false;
        document.getElementById("errorTel").innerHTML = "Please enter a valid phone number (8 digits).";
    } else {
        document.getElementById("errorTel").innerHTML = "";
    }

    if (!isValid) {
        event.preventDefault(); // Empêcher la soumission du formulaire si la validation échoue
    }

    return isValid;
}

document.getElementById("userForm").addEventListener("submit", validateForm);
