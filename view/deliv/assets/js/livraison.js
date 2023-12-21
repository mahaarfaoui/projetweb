function adresseLivValidation() {
    var adresseLiv = document.getElementById('adresseLiv').value;
    if(adresseLiv.length < 5) {
        document.getElementById('adresseLivError').innerHTML = "<p style='color:red'>Veuillez saisir une adresse valide</p>";
        e.preventDefault();
        return false;
    }
    else {
        document.getElementById('adresseLivError').innerHTML = "<p style='color:green'>Adresse valide</p>";
        return true;
    }
}

document.getElementById('addLiv').addEventListener('submit', function(e) {
    if(adresseLivValidation() == false) {
        document.getElementById('adresseLivError').innerHTML = "<p style='color:red'>Ce champ est requis</p>";
        e.preventDefault;
    }
});