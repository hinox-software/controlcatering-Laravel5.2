
 $(document).ready(function() {
        $("#estado_id").change(function() {
            $.getJSON("../api/motivos/" + $("#estado_id").val(), function(data) {
                var $stations = $("#motivo_id");
                $stations.empty();
                $.each(data, function(index, value) {
                    $stations.append('<option value="' + index +'">' + value + '</option>');
                });
            $("#motivo_id").trigger("change"); /* trigger next drop down list not in the example */
            });
        });

    $('#fechaimportado').datepicker({
        autoclose: true,
        language: 'es',
        todayHighlight: true,
         format: 'dd/mm/yyyy',

        });
    $('#fechageneracion').datepicker({
        autoclose: true,
        language: 'es',
        todayHighlight: true,
         format: 'dd/mm/yyyy',

        });
    $('#fechacerrarjornada').datepicker({
        autoclose: true,
        language: 'es',
        todayHighlight: true,
         format: 'dd/mm/yyyy',

        });
      
    });