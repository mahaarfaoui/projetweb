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

document.getElementById('addFact').addEventListener('submit', function(e) {
    var dateFact = document.getElementById('dateFact').value;
    var montant = document.getElementById('montant').value;
    if (dateFact === "" || montant === "") {
        document.getElementById('dateFactError').innerHTML = "<p style='color:red'>Ce champ est requis</p>";
        document.getElementById('montantError').innerHTML = "<p style='color:red'>Ce champ est requis</p>";
        e.preventDefault();
    }
});

document.getElementById('updateFact').addEventListener('submit', function(e) {
    var dateFact = document.getElementById('dateFact').value;
    var montant = document.getElementById('montant').value;
    if (dateFact === "" || montant.length == 0) {
        document.getElementById('dateFactError').innerHTML = "<p style='color:red'>Ce champ est requis</p>";
        document.getElementById('montantError').innerHTML = "<p style='color:red'>VCe champ est requis</p>";
        e.preventDefault();
    }
});
