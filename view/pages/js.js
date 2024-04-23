function validateForm(form) {
    var idS = form.elements["idS"].value.trim();
    var code = form.elements["code"].value.trim();
    var nbrE = form.elements["nbrE"].value.trim();
    var nomProf = form.elements["nomProf"].value.trim();
    var type = form.elements["type"].value.trim();
    
    // Validation de l'ID de session
    if (idS === '') {
        alert("Veuillez saisir l'ID de session.");
        return false;
    } else if (isNaN(idS) || parseInt(idS) <= 0) {
        alert("L'ID de session doit être un entier positif.");
        return false;
    }

    // Validation du code de session
    if (code === '') {
        alert("Veuillez saisir le code de session.");
        return false;
    } else if (isNaN(code) || parseInt(code) <= 0) {
        alert("Le code de session doit être un entier positif.");
        return false;
    }

    // Validation du nombre d'étudiants
    if (nbrE === '') {
        alert("Veuillez saisir le nombre d'étudiants.");
        return false;
    } else if (isNaN(nbrE) || parseInt(nbrE) <= 0) {
        alert("Le nombre d'étudiants doit être un entier positif.");
        return false;
    }

    // Validation du nom du professeur
    if (nomProf === '') {
        alert("Veuillez saisir le nom du professeur.");
        return false;
    } else if (!/^[a-zA-Z]+$/.test(nomProf)) {
        alert("Le nom du professeur ne peut contenir que des lettres.");
        return false;
    }

    // Validation du type de session
    if (type === '') {      alert("Veuillez saisir le type.");
    return false;
} else if (!/^[a-zA-Z]+$/.test(type)) {
    alert("Le type ne peut contenir que des lettres.");
    return false;
}
    
    return true;
}
