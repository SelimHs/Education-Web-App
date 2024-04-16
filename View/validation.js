document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('userForm');
    var errorContainer = document.getElementById('errorContainer');

    form.addEventListener('submit', function(event) {
        var isValid = true;

        if (!isValidName('Surname')) {
            isValid = false;
            document.getElementById('Surname').classList.add('is-invalid');
        } else {
            document.getElementById('Surname').classList.remove('is-invalid');
        }

        if (!isValidName('FirstName')) {
            isValid = false;
            document.getElementById('FirstName').classList.add('is-invalid');
        } else {
            document.getElementById('FirstName').classList.remove('is-invalid');
        }

        if (document.getElementById('Password').value.trim().length < 6) {
            isValid = false;
            document.getElementById('Password').classList.add('is-invalid');
        } else {
            document.getElementById('Password').classList.remove('is-invalid');
        }

        if (document.getElementById('PasswordC').value.trim() !== document.getElementById('Password').value.trim()) {
            isValid = false;
            document.getElementById('PasswordC').classList.add('is-invalid');
        } else {
            document.getElementById('PasswordC').classList.remove('is-invalid');
        }

        if (document.getElementById('Genre').value.trim() === "") {
            isValid = false;
            document.getElementById('Genre').classList.add('is-invalid');
        } else {
            document.getElementById('Genre').classList.remove('is-invalid');
        }

        if (!isValidEmail('Email')) {
            isValid = false;
            document.getElementById('Email').classList.add('is-invalid');
        } else {
            document.getElementById('Email').classList.remove('is-invalid');
        }

        if (!isValidTel('Tel')) {
            isValid = false;
            document.getElementById('Tel').classList.add('is-invalid');
        } else {
            document.getElementById('Tel').classList.remove('is-invalid');
        }

        if (document.getElementById('Function').value.trim() === "") {
            isValid = false;
            document.getElementById('Function').classList.add('is-invalid');
        } else {
            document.getElementById('Function').classList.remove('is-invalid');
        }

        if (!isValid) {
            event.preventDefault(); // Empêcher l'envoi du formulaire si des erreurs sont présentes
            errorContainer.textContent = "Veuillez remplir tous les champs correctement";
        } else {
            errorContainer.textContent = ""; // Réinitialiser le message d'erreur global
        }
    });
});
