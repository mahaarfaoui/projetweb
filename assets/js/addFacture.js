function montantValidation() {
    var montant = document.getElementById('montant').value;
    if(montant <= 0) {
        document.getElementById('montantError').innerHTML = "<p style='color:red'>Please input a valid amount</p>";
        e.preventDefault();
        return false;
    }
    else {
        document.getElementById('montantError').innerHTML = "<p style='color:green'>Valid amount</p>";
        return true;
    }
}

function reset() {
    document.getElementById('dateFactError').innerHTML = "";
    document.getElementById('montantError').innerHTML = "";
}

document.getElementById('addFact').addEventListener('submit', function(e) {
    var dateFact = document.getElementById('dateFact').value;
    var montant = document.getElementById('montant').value;
    if (dateFact === "") {
        document.getElementById('dateFactError').innerHTML = "<p style='color:red'>This field is required!</p>";
        document.getElementById('montantError').innerHTML = "<p style='color:red'>This field is required!</p>";
        e.preventDefault();
    }
});