<?php $__env->startSection('htmlheader_title'); ?>
	Usuarios
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
<div class="row">

    <div class="col-md-10 col-md-offset-1">

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa  fa-users"></i> Registrar Usuario   
            </div>

        <!-- INICIO BODY-->
        <div class="panel-body">
         <?php echo $__env->make('alertas/requerido', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
         <?php echo Form::open(['route'=>'user.store','method'=>'POST']); ?>

            <div class="row">
            <div class="col-lg-6 col-md-6">  
                <div class="form-group">
                    <?php echo Form::label('Nombre'); ?>

                    <?php echo Form::text('name', null , ['class'=>'form-control pullright','placeholder'=>'Nombre']); ?>

                </div>
            </div>
            <div class="col-lg-3 col-md-3 ">  
                <div class="form-group">
                    <?php echo Form::label('Correo'); ?>

                    <?php echo Form::text('email', null, ['class'=>'form-control pullright','placeholder'=>'Correo']); ?>

                </div>
            </div>
            <div class="col-lg-3 col-md-3 ">  
                <div class="form-group">
                    <?php echo Form::label('Contraseña'); ?>

                    <?php echo Form::password('password', null, ['class'=>'form-control pullright']); ?>

                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    <?php echo Form::label('Tipo'); ?>

                    <?php echo Form::select('tipo', Config::get('constants.tipouser'),null, ['class' => 'form-control pullright']); ?>

                </div>
            </div>
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    <?php echo Form::label('Dpto'); ?>

                    <?php echo Form::select('dpto', Config::get('constants.dpto'),null, ['class' => 'form-control pullright']); ?>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 ">  
                <div class="form-group">
                    <?php echo Form::label('Estado'); ?>

                    <?php echo Form::select('estado', Config::get('constants.estado'),null, ['class' => 'form-control pullright']); ?>

                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    <?php echo Form::label('Instalaciones'); ?>

                    <?php echo Form::select('activaInstalacion', Config::get('constants.activaInstalacion'),null, ['class' => 'form-control pullright']); ?>

                </div>
            </div>
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    <?php echo Form::label('Retiros'); ?>

                    <?php echo Form::select('activaRetiro', Config::get('constants.activaRetiro'),null, ['class' => 'form-control pullright']); ?>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 ">  
                <div class="form-group">
                    <?php echo Form::label('Asistencia'); ?>

                    <?php echo Form::select('activaAsitencia', Config::get('constants.activaAsitencia'),null, ['class' => 'form-control pullright']); ?>

                </div>
            </div>
            </div>
            
            <div class="row">
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    <?php echo Form::label('Coordinacion'); ?>

                    <?php echo Form::select('activaCoordinacion', Config::get('constants.activaCoordinacion'),null, ['class' => 'form-control pullright']); ?>

                </div>
            </div>
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    <?php echo Form::label('Centralizacion'); ?>

                    <?php echo Form::select('activaCentralizacion', Config::get('constants.activaCentralizacion'),null, ['class' => 'form-control pullright']); ?>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 ">  
                <div class="form-group">
                    <?php echo Form::label('Digitacion'); ?>

                    <?php echo Form::select('activaDigitacion', Config::get('constants.activaDigitacion'),null, ['class' => 'form-control pullright']); ?>

                </div>
            </div>
            </div>
        <?php echo link_to_route('user.index', $title = 'Cancelar',(''), $attributes = ['class'=>'btn btn-primary']);; ?>

        <?php echo Form::submit('Registrar', ['class'=>'btn btn-primary']); ?>

         <?php echo Form::close(); ?>

         <div class="row">
        <div class="col-lg-3 col-md-3 ">  
                <div class="form-group">
                    <?php echo Form::label('Fecha Registro'); ?>

                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                            <?php echo Form::text('fecha_registro',date('d/m/Y'), ['class'=>'form-control', 'placeholder'=>'Fecha Registro','id'=>'fecha_registro']); ?>

                    </div>
                </div> 
            </div>
        </div>

        
        </div>               
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>