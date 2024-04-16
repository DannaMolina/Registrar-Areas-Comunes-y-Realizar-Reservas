function validarEliminarReserva(e) {
    e.preventDefault();
    url = e.currentTarget.getAttribute('href');

    urlArray = url.split("/");

    urlAjax = SERVERURL + "Views/modules/reserva/ajaxReserva.php";

    Swal.fire({
        title: "Estas Seguro de Eliminar Este Registro?",
        text: "¡No podra Revertir Los cambios!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Eliminar"
    }).then((result) => {
        if (result.isConfirmed) {
            var operacion = urlArray[6];
            var id = urlArray[7];
            var datos = new FormData();
            var fila = '#fila' + id;
            datos.append("id", id);
            datos.append("ope", operacion);
            $.ajax({
                url: urlAjax,
                method: "POST",
                data: datos,
                contentType: false,
                processData: false,
                success: function (respuesta) {
                    //console.log(respuesta);
                    if (respuesta == 'success') {
                        Swal.fire({
                            title: "Registro Eliminado Corretamente!",
                            text: "El Registro Ha Sido Eliminado.",
                            icon: "success"
                        });
                        $(fila).remove();
                    }
                    else{
                        Swal.fire({
                            title: "¡ERRROR! Registro No Eliminado!",
                            text: "El Registro No Fue Eliminado.",
                            icon: "error"
                        });
                    }
                }
            })

        }
    });
    return false;
}