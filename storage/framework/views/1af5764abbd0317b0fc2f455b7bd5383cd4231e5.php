<div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 ">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    
                        <b>Trabajos:</b> <?php echo e(Config::get('constants.tipotrabajo.'.$tipotrabajo)); ?> - <b>Area:</b> <?php echo e(Config::get('constants.areas.'.$area)); ?> - <b>Adicionar Trabajo</b>
                    
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  <?php echo e(Auth::user()->name); ?>

                        </div>
                    </div>    
                    <div class="panel-body">
                        <?php echo Form::model($tra,['route'=>['trabajos.updatetrabajos',$tra->id, $tipotrabajo, $area],'method'=>'PUT']); ?>

                         <div class="row">
                            <div class="col-lg-1 col-md-1">  
                                <dl >
                                    <dt>Fecha</dt>
                                    <dd> <?php echo e(Carbon\Carbon::now()->format('d/m/Y H:i')); ?></dd>
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>P-Geo</dt>
                                    <dd>
                                        <?php echo Form::text('posgeo',$tra->posgeo, ['id'=> 'posgeo','class'=>'form-control pullright', 'readonly']); ?>

                                    </dd>                                       
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Zona</dt>
                                    <dd>
                                        <?php echo Form::select('zona_id', $zona,$tra->zonaasig, ['class' => 'form-control pullright']); ?>

                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Tecnico</dt>
                                    <dd>
                                         <?php echo Form::select('tecnico_id', $tecnicos,null, ['class' => 'form-control pullright', 'readonly', 'disabled']); ?>

                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Horario</dt>
                                    <dd>
                                         <?php echo Form::select('horario_id', Config::get('constants.horarios'),$tra->horario, ['class' => 'form-control pullright']); ?>

                                    </dd>                                        
                                </dl>
                            </div>
                            
                        </div> 
                        <div class="row">
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Estado</dt>
                                    <dd> 
                                        <?php echo Form::select('estado_id', Config::get('constants.estadoCoordinacion'),null, ['class' => 'form-control pullright', 'id'=> 'estado_id']); ?>

                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Motivo</dt>
                                    <dd>
                                        <?php echo Form::select('motivo_id', Config::get('constants.motivo.ATENDIDO'),null, ['class' => 'form-control pullright', 'id'=> 'motivo_id']); ?>

                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-6 col-md-6">  
                                <dl >
                                    <dt>Descripcion del Trabajo</dt>
                                    <dd>
                                        <?php echo e(Form::textarea('descripcion_id', null, ['size' => '50x2'])); ?>

                                    </dd>                                        
                                </dl>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-md-10">
                                <?php echo link_to_route('trabajos.mostrartrabajos', $title = 'Cancelar',[$tipotrabajo, $area], $attributes = ['class'=>'btn btn-primary']);; ?>

                                <?php echo Form::submit('Registrar Trabajo', ['class'=>'btn btn-primary']); ?>

                                <?php echo Form::close(); ?>

                            </div>
                        </div>        
                    </div> <!-- fin del panel-->   
                </div>    
            </div>    
        </div>
    </div>    