<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="<?php echo e(asset('/plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script>

<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo e(asset('/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('/js/app.min.js')); ?>" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

<script type="text/javascript">
    
$(document).ready(function() {
        $("#estado_id").change(function() {
            $.getJSON("/api/motivos/" + $("#estado_id").val() + "/"+ $("#area_id").val(), function(data) {
                var $stations = $("#motivo_id");
                $stations.empty();
                $.each(data, function(index, value) {
                    $stations.append('<option value="' + index +'">' + value + '</option>');
                });
            $("#motivo_id").trigger("change"); /* trigger next drop down list not in the example */
            });
        });
    });
</script>       


