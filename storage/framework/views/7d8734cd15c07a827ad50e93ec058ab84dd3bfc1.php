<?php $__env->startSection('htmlheader_title'); ?>
	Usuarios
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
<div class="row">

    <div class="col-md-10 col-md-offset-1">

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa  fa-users"></i> Editar Usuario
                
            </div>

        <!-- INICIO BODY-->
        <div class="panel-body">
         <?php echo $__env->make('alertas/requerido', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
         <?php echo Form::model($usu,['route'=>['user.update',$usu->id],'method'=>'PUT']); ?>

            <div class="row">
            <div class="col-lg-6 col-md-6">  
                <div class="form-group">
                    <?php echo Form::label('Nombre'); ?>

                    <?php echo Form::text('name', $usu->name , ['class'=>'form-control pullright','placeholder'=>'Nombre']); ?>

                </div>
            </div>
            <div class="col-lg-3 col-md-3 ">  
                <div class="form-group">
                    <?php echo Form::label('Correo'); ?>

                    <?php echo Form::text('email', $usu->email, ['class'=>'form-control pullright','placeholder'=>'Correo','readonly']); ?>

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

                    <?php echo Form::select('tipo', Config::get('constants.tipouser'),$usu->tipo, ['class' => 'form-control pullright']); ?>

                </div>
            </div>
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    <?php echo Form::label('Dpto'); ?>

                    <?php echo Form::select('dpto', Config::get('constants.dpto'),$usu->dpto, ['class' => 'form-control pullright']); ?>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 ">  
                <div class="form-group">
                    <?php echo Form::label('Estado'); ?>

                    <?php echo Form::select('estado', Config::get('constants.estado'),$usu->estado, ['class' => 'form-control pullright']); ?>

                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    <?php echo Form::label('Instalaciones'); ?>

                    <?php echo Form::select('activaInstalacion', Config::get('constants.activaInstalacion'),$usu->activaInstalacion, ['class' => 'form-control pullright']); ?>

                </div>
            </div>
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    <?php echo Form::label('Retiros'); ?>

                    <?php echo Form::select('activaRetiro', Config::get('constants.activaRetiro'),$usu->activaRetiro, ['class' => 'form-control pullright']); ?>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 ">  
                <div class="form-group">
                    <?php echo Form::label('Asistencia'); ?>

                    <?php echo Form::select('activaAsitencia', Config::get('constants.activaAsitencia'),$usu->activaAsitencia, ['class' => 'form-control pullright']); ?>

                </div>
            </div>
            </div>
            
            <div class="row">
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    <?php echo Form::label('Coordinacion'); ?>

                    <?php echo Form::select('activaCoordinacion', Config::get('constants.activaCoordinacion'),$usu->activaCoordinacion, ['class' => 'form-control pullright']); ?>

                </div>
            </div>
            <div class="col-lg-4 col-md-4">  
                <div class="form-group">
                    <?php echo Form::label('Centralizacion'); ?>

                    <?php echo Form::select('activaCentralizacion', Config::get('constants.activaCentralizacion'),$usu->activaCentralizacion, ['class' => 'form-control pullright']); ?>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 ">  
                <div class="form-group">
                    <?php echo Form::label('Digitacion'); ?>

                    <?php echo Form::select('activaDigitacion', Config::get('constants.activaDigitacion'),$usu->activaDigitacion, ['class' => 'form-control pullright']); ?>

                </div>
            </div>
            </div>
        <?php echo link_to_route('user.index', $title = 'Cancelar',(''), $attributes = ['class'=>'btn btn-primary']);; ?>

        <?php echo Form::submit('Actualizar', ['class'=>'btn btn-primary']); ?>

         <?php echo Form::close(); ?>

         
        
        </div>               
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>