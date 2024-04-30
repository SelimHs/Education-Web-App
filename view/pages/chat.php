<script>
    function openChat() {
        // Récupérer l'ID de session entré par l'utilisateur
        var sessionId = document.getElementsByName("sessionId")[0].value;

        // Vérifier si l'ID de session est vide
        if (sessionId.trim() === "") {
            alert("Please enter a valid Session ID.");
            return false;
        }

        // Ouvrir le chatbot avec l'ID de session
        // Remplacez 'your-chatbot-url' par l'URL de votre chatbot
        window.open("your-chatbot-url?id=" + sessionId, "_blank");

        return false; // Empêcher la soumission du formulaire
    }
</script>
