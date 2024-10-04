
    $(document).ready(function () {
        $('#distrito').on('change', function () {
            var distrito_id = $(this).val();

            if (distrito_id) {
                $.ajax({
                    type: 'POST',
                    url: '../obtener_zonas.php',
                    data: { distrito_id: distrito_id },
                    success: function (response) {
                        $('#zona').html('<option value="">Seleccione una zona</option>');
                        var zonas = JSON.parse(response);
                        $.each(zonas, function (index, zona) {
                            $('#zona').append('<option value="' + zona.id + '">' + zona.nombre + '</option>');
                        });
                    }
                });
            } else {
                $('#zona').html('<option value="">Seleccione un distrito primero</option>');
            }
        });
    });
