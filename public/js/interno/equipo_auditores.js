function equiposAuditories() {

    var id = document.getElementsByName("idauditor[]");

    var doc = document.getElementsByName("documento[]");
    var nom = document.getElementsByName("nombre[]");

    var idau = [];
    var docm = [];
    var nombre = [];

    for (var i = 0; i < id.length; i++) {
        var idAudit = id[i];
        var documentAudit = doc[i];
        var nombreAudit = nom[i];
        console.log(idAudit.value);

        idau.push((idAudit.value));
        docm.push((documentAudit.value));
        nombre.push((nombreAudit.value));

    }
    var idaudit = idau.toString();
    var documaudit = document.toString();
    var nameaudit = nombre.toString();


    $("#idAuditor").val(idaudit);
    $("#documentoAuditor").val(documaudit);
    $("#nombreAuditor").val(nameaudit);

}