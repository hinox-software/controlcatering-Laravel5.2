<div class="col-xs-12 col-md-12">
         
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->

                
                @foreach ($his as $key=>$h)
                @if($key == 0)

                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title col-xs-12 col-lg-12 col-md-12">
                              <a aria-expanded="true" class="" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> 
                        Fecha: {!! date('d/m/Y H:i',strtotime($h->fechaactualizado)) !!} - Area: {!! config('constants.areas.'.$h->areaactual) !!} - OT: {!! $h->ot !!}                      
                      </a>
                      <div class="pull-right info">
                            <i class="fa fa-user"></i>  {{ $h->usuario->name}}
                            </div>                            
                    </h4>
                  </div>
                  <div style="" aria-expanded="false" id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">
                       <div class="row">
                            <div class="col-xs-3 col-lg-3 col-md-3">  
                                <dl >
                                    <dt>P-Geo</dt>
                                    <dd>
                                        {!!$h->posgeo!!}
                                    </dd>                                       
                                </dl>
                            </div>
                            <div class="col-xs-1 col-lg-1 col-md-1">  
                                <dl >
                                    <dt>Zona</dt>
                                    <dd>
                                        {!! $h->zonaasig !!}
                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-xs-3 col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Tecnico</dt>
                                    <dd>
                                         {!! $h->tecnicoasig !!}
                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-xs-3 col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Horario</dt>
                                    <dd>
                                         {!! config('constants.horarios.'.$h->horario)!!}
                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Fecha Importado</dt>
                                    <dd>
                                        {!!date('d/m/Y H:i',strtotime($h->fechaimportado))!!}
                                    </dd>                                       
                                </dl>
                            </div>   
                            
                        </div> 
                        <div class="row">
                            <div class="col-xs-3 col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Estado</dt>
                                    <dd> 
                                        {!! $h->estado !!}
                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-xs-3 col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Motivo</dt>
                                    <dd>
                                        {!! $h->motivo !!}
                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-xs-6 col-lg-6 col-md-6">  
                                <dl >
                                    <dt>Descripcion del Trabajo</dt>
                                    <dd>
                                        {{$h->descripcion }}
                                    </dd>                                        
                                </dl>
                            </div>
                            
                        </div>
                       
                      
                    </div>
                  </div>
                </div>
                
                @else
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title col-xs-12 col-lg-12 col-md-12">
                      <a aria-expanded="true" class="" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $h->id}}">
                        Fecha: {!! date('d/m/Y H:i',strtotime($h->fechaactualizado)) !!} - Area: {!! config('constants.areas.'.$h->areaactual) !!} - OT: {!! $h->ot !!}                      
                      </a>
                      <div class="pull-right info">
                            <i class="fa fa-user"></i>  {{ $h->usuario->name}}
                            </div> 
                    </h4>
                  </div>
                  <div style="" aria-expanded="true" id="collapse{{ $h->id}}" class="panel-collapse collapse in">
                    
                    <div class="box-body">
                      <div class="row">
                            <div class="col-xs-3 col-lg-3 col-md-3">  
                                <dl >
                                    <dt>P-Geo</dt>
                                    <dd>
                                        {!!$h->posgeo!!}
                                    </dd>                                       
                                </dl>
                            </div>
                            <div class="col-xs-1 col-lg-1 col-md-1">  
                                <dl >
                                    <dt>Zona</dt>
                                    <dd>
                                        {!! $h->zonaasig !!}
                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-xs-3 col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Tecnico</dt>
                                    <dd>
                                         {!! $h->tecnicoasig !!}
                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-xs-2 col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Horario</dt>
                                    <dd>
                                         {!! config('constants.horarios.'.$h->horario)!!}
                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Fecha Importado</dt>
                                    <dd>
                                        {!!date('d/m/Y H:i',strtotime($h->fechaimportado))!!}
                                    </dd>                                       
                                </dl>
                            </div>   
                            
                        </div> 
                        <div class="row">
                            <div class="col-xs-3 col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Estado</dt>
                                    <dd> 
                                        {!! $h->estado !!}
                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-xs-3 col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Motivo</dt>
                                    <dd>
                                        {!! $h->motivo !!}
                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-xs-6 col-lg-6 col-md-6">  
                                <dl >
                                    <dt>Descripcion del Trabajo</dt>
                                    <dd>
                                        {{$h->descripcion }}
                                    </dd>                                        
                                </dl>
                            </div>
                            
                        </div>
                     
                    </div>
                  </div>
                </div>
                @endif
                
                @endforeach
                
        
        </div>