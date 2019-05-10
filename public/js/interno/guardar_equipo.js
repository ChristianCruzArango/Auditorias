jQuery('#ajaxSubmitEquipo').click(function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: " auditores/post",
        method: 'post',
        data: {
            'id': jQuery('#idAuditor').val(),
            'documento': jQuery('#documentoAuditor').val(),
            'nombre': jQuery('#nombreAuditor').val()
        },
        //processData: true,
        success: function(result) {
            // alert(result);
            if (result == '') {
                alert('Se guardo el equipo correctamente');
                location.href = "http://localhost:9090/proyect_auditorias/public/admin/auditores";
            }
        }
    });
});