<div class="col-md-12">
         
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->

                
                <?php foreach($his as $key=>$h): ?>
                <?php if($key == 0): ?>

                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title col-lg-12 col-md-12">
                              <a aria-expanded="true" class="" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> 
                        Fecha: <?php echo date('d/m/Y H:i',strtotime($h->fechaactualizado)); ?> - Area: <?php echo config('constants.areas.'.$h->areaactual); ?> - OT: <?php echo $h->ot; ?>                      
                      </a>
                      <div class="pull-right info">
                            <i class="fa fa-user"></i>  <?php echo e($h->usuario->name); ?>

                            </div>                            
                    </h4>
                  </div>
                  <div style="" aria-expanded="false" id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">
                       <div class="row">
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>P-Geo</dt>
                                    <dd>
                                        <?php echo $h->posgeo; ?>

                                    </dd>                                       
                                </dl>
                            </div>
                            <div class="col-lg-1 col-md-1">  
                                <dl >
                                    <dt>Zona</dt>
                                    <dd>
                                        <?php echo $h->zonaasig; ?>

                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Tecnico</dt>
                                    <dd>
                                         <?php echo $h->tecnicoasig; ?>

                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Horario</dt>
                                    <dd>
                                         <?php echo config('constants.horarios.'.$h->horario); ?>

                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Fecha Importado</dt>
                                    <dd>
                                        <?php echo date('d/m/Y H:i',strtotime($h->fechaimportado)); ?>

                                    </dd>                                       
                                </dl>
                            </div>   
                            
                        </div> 
                        <div class="row">
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Estado</dt>
                                    <dd> 
                                        <?php echo $h->estado; ?>

                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Motivo</dt>
                                    <dd>
                                        <?php echo $h->motivo; ?>

                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-6 col-md-6">  
                                <dl >
                                    <dt>Descripcion del Trabajo</dt>
                                    <dd>
                                        <?php echo e($h->descripcion); ?>

                                    </dd>                                        
                                </dl>
                            </div>
                            
                        </div>
                       
                      
                    </div>
                  </div>
                </div>
                
                <?php else: ?>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title col-lg-12 col-md-12">
                      <a aria-expanded="false" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($h->id); ?>">
                        Fecha: <?php echo date('d/m/Y H:i',strtotime($h->fechaactualizado)); ?> - Area: <?php echo config('constants.areas.'.$h->areaactual); ?> - OT: <?php echo $h->ot; ?>                      
                      </a>
                      <div class="pull-right info">
                            <i class="fa fa-user"></i>  <?php echo e($h->usuario->name); ?>

                            </div> 
                    </h4>
                  </div>
                  <div style="height: 0px;" aria-expanded="true" id="collapse<?php echo e($h->id); ?>" class="panel-collapse collapse">
                    <div class="box-body">
                      <div class="row">
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>P-Geo</dt>
                                    <dd>
                                        <?php echo $h->posgeo; ?>

                                    </dd>                                       
                                </dl>
                            </div>
                            <div class="col-lg-1 col-md-1">  
                                <dl >
                                    <dt>Zona</dt>
                                    <dd>
                                        <?php echo $h->zonaasig; ?>

                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Tecnico</dt>
                                    <dd>
                                         <?php echo $h->tecnicoasig; ?>

                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Horario</dt>
                                    <dd>
                                         <?php echo config('constants.horarios.'.$h->horario); ?>

                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Fecha Importado</dt>
                                    <dd>
                                        <?php echo date('d/m/Y H:i',strtotime($h->fechaimportado)); ?>

                                    </dd>                                       
                                </dl>
                            </div>   
                            
                        </div> 
                        <div class="row">
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Estado</dt>
                                    <dd> 
                                        <?php echo $h->estado; ?>

                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Motivo</dt>
                                    <dd>
                                        <?php echo $h->motivo; ?>

                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-6 col-md-6">  
                                <dl >
                                    <dt>Descripcion del Trabajo</dt>
                                    <dd>
                                        <?php echo e($h->descripcion); ?>

                                    </dd>                                        
                                </dl>
                            </div>
                            
                        </div>
                     
                    </div>
                  </div>
                </div>
                <?php endif; ?>
                
                <?php endforeach; ?>
                
        
        </div>