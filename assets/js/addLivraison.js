function adresseLivValidation() {
    var adresseLiv = document.getElementById('adresseLiv').value;
    if(adresseLiv.trim().length < 10) {
        document.getElementById('adresseLivError').innerHTML = "<p style='color:red'>Veuillez saisir une adresse valide</p>";
        e.preventDefault();
        return false;
    }
    else {
        document.getElementById('adresseLivError').innerHTML = "<p style='color:green'>Adresse valide</p>";
        return true;
    }
}

function numFactValidation() {
    var val = document.getElementById('numFact').value;
    if(val == null) {
        document.getElementById('numFactError').innerHTML = "<p style='color:red'>Veuillez sélectionner un numéro de facture</p>"
        e.preventDefault();
        return false;
    }
    else {
        document.getElementById('numFactError').innerHTML = "<p style='color:green'>Valide</p>"
        return true;
    }
}

function etatLivValidation() {
    var etat = document.querySelector('select');
    if(etat.value == null) {
        document.getElementById('etatLivError').innerHTML = "<p style='color:red'>Veuillez sélectionner l'état de livraison</p>"
        e.preventDefault();
        return false;
    }
    else {
        document.getElementById('etatLivError').innerHTML = "<p style='color:green'>Valide</p>"
        return true;
    }
}

document.getElementById('addLiv').addEventListener('submit', function(e) {
    var adresseLiv = document.getElementById('adresseLiv').value;
    var num = document.getElementById('numFact').value;
    var etat= document.querySelector('select');
    if (etat.value == 0 || adresseLiv === "" || num == 0) {
        document.getElementById('etatLivError').innerHTML = "<p style='color:red'>Ce champ est requis</p>";
        document.getElementById('adresseLivError').innerHTML = "<p style='color:red'>Ce champ est requis</p>";
        document.getElementById('numFactError').innerHTML = "<p style='color:red'>Ce champ est requis</p>";
        e.preventDefault();
    }
});