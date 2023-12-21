function montantValidation() {
    var montant = document.getElementById('montant').value;
    if(montant <= 0) {
        document.getElementById('montantError').innerHTML = "<p style='color:red'>Veuillez saisir un montant valide</p>";
        e.preventDefault();
        return false;
    }
    else {
        document.getElementById('montantError').innerHTML = "<p style='color:green'>Montant valide</p>";
        return true;
    }
}

function numValidation() {
    var num = document.getElementById('numFacture').value;
    if(num <= 0) {
        document.getElementById('numFactError').innerHTML = "<p style='color:red'>Veuillez saisir un numéro de facture valide</p>";
        e.preventDefault();
        return false;
    }
    else {
        document.getElementById('numFactError').innerHTML = "<p style='color:green'>Numéro valide</p>";
        return true;
    }
}


document.getElementById('updateFact').addEventListener('submit', function(e) {
    var num = document.getElementById('numFacture').value;
    var dateFact = document.getElementById('dateFact').value;
    var montant = document.getElementById('montant').value;
    if (num === "" || dateFact === "" || montant === "") {
        document.getElementById('numFactError').innerHTML = "<p style='color:red'>Ce champ est requis</p>";
        document.getElementById('dateFactError').innerHTML = "<p style='color:red'>Ce champ est requis</p>";
        document.getElementById('montantError').innerHTML = "<p style='color:red'>Ce champ est requis</p>";
        e.preventDefault();
    }
});
