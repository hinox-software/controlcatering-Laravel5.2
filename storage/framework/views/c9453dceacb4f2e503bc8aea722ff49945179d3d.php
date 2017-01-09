<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    
    

    <title><?php echo e(trans('adminlte_lang::message.landingdescriptionpratt')); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('/css/bootstrap.css')); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('/css/main.css')); ?>" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="<?php echo e(asset('/plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/smoothscroll.js')); ?>"></script>


</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<!-- Fixed navbar -->
<div id="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/login"><b>DATA RED - Sistema OT</b></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#home" class="smoothScroll"><?php echo e(trans('adminlte_lang::message.home')); ?></a></li>
                <li><a href="#desc" class="smoothScroll"><?php echo e(trans('adminlte_lang::message.description')); ?></a></li>
                <li><a href="#contact" class="smoothScroll"><?php echo e(trans('adminlte_lang::message.contact')); ?></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(url('/login')); ?>"><?php echo e(trans('adminlte_lang::message.login')); ?></a></li>
                    
                <?php else: ?>
                    <li><a href="/home"><?php echo e(Auth::user()->name); ?></a></li>
                <?php endif; ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>


<section id="home" name="home"></section>
<div id="headerwrap">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-12">
                <h1>Software de Seguimiento de <a href="#"><b>Ordenes de Trabajos</b></a></b></h1>
                <h3><a href="<?php echo e(url('/login')); ?>" class="btn btn-lg btn-success"><?php echo e(trans('adminlte_lang::message.gedstarted')); ?></a></h3>
            </div>
            <div class="col-lg-2">
                
            </div>
            <div class="col-lg-8">
                <img class="img-responsive" src="<?php echo e(asset('/img/portada.png')); ?>" alt="">
            </div>
            <div class="col-lg-2">
                
            </div>
        </div>
    </div> <!--/ .container -->
</div><!--/ #headerwrap -->


<section id="desc" name="desc"></section>
<!-- INTRO WRAP -->
<div id="intro">
    <div class="container">
        <div class="row centered">
            <h1><?php echo e(trans('adminlte_lang::message.designed')); ?></h1>
            <br>
            <br>
            <div class="col-lg-4">
                <img src="<?php echo e(asset('/img/intro01.png')); ?>" alt="">
                <h3><?php echo e(trans('adminlte_lang::message.community')); ?></h3>
                <p>Responsable del Contacto con el Cliente final para brindar un mejor servicio durante la realizacion de los trabajos.</p>
            </div>
            <div class="col-lg-4">
                <img src="<?php echo e(asset('/img/intro02.png')); ?>" alt="">
                <h3><?php echo e(trans('adminlte_lang::message.schedule')); ?></h3>
                <p>Asignacion y Seguimiento al personal tecnico para la correcta ejecucion del trabajo en el domicilio del Cliente.</p>
            </div>
            <div class="col-lg-4">
                <img src="<?php echo e(asset('/img/intro03.png')); ?>" alt="">
                <h3><?php echo e(trans('adminlte_lang::message.monitoring')); ?></h3>
                <p>Registro y Control de los trabajos ejecutados procediendo con la habilitacion en sistema del servicio.</p>
            </div>
        </div>
        <br>
        <hr>
    </div> <!--/ .container -->
</div><!--/ #introwrap -->

<!-- FEATURES WRAP -->
<div id="features">
    <div class="container">
        <div class="row">
            <h1 class="centered"><?php echo e(trans('adminlte_lang::message.whatnew')); ?></h1>
            <br>
            <br>
            <div class="col-lg-6 centered">
                <img class="centered" src="<?php echo e(asset('/img/pantallas-tema.png')); ?>" alt="">
            </div>

            <div class="col-lg-6">
                <h3><?php echo e(trans('adminlte_lang::message.features')); ?></h3>
                <br>
                <!-- ACCORDION -->
                <div class="accordion ac" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                <?php echo e(trans('adminlte_lang::message.design')); ?>

                            </a>
                        </div><!-- /accordion-heading -->
                        <div id="collapseOne" class="accordion-body collapse ">
                            <div class="accordion-inner">
                                <p>Permite importar datos de las Ordenes de Trabajo mediante una hoja Excel, facilitando el proceso de registro. </p>
                            </div><!-- /accordion-inner -->
                        </div><!-- /collapse -->
                    </div><!-- /accordion-group -->
                    <br>

                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                <?php echo e(trans('adminlte_lang::message.retina')); ?>

                            </a>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <p>Permite realizar el regisgtro de todos los trabajoa realizado sobre una Orde de Trabajo, para realizar el seguimiento on-line sobre el estado y area actual.</p>
                            </div><!-- /accordion-inner -->
                        </div><!-- /collapse -->
                    </div><!-- /accordion-group -->
                    <br>

                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                <?php echo e(trans('adminlte_lang::message.support')); ?>

                            </a>
                        </div>
                        <div id="collapseThree" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <p>Permite crear o diseñar cualquier tipo de reportes a requerimiento, totalmente flexible.</p>
                            </div><!-- /accordion-inner -->
                        </div><!-- /collapse -->
                    </div><!-- /accordion-group -->
                    <br>

                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                                <?php echo e(trans('adminlte_lang::message.responsive')); ?>

                            </a>
                        </div>
                        <div id="collapseFour" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <p>Ambiente 100% Web y adaptable para cualquier dispositivo, software amigable y personalizable.</p>
                            </div><!-- /accordion-inner -->
                        </div><!-- /collapse -->
                    </div><!-- /accordion-group -->
                    <br>
                </div><!-- Accordion -->
            </div>
        </div>
    </div><!--/ .container -->
</div><!--/ #features -->




<section id="contact" name="contact"></section>
<div id="footerwrap">
    <div class="container">
        <div class="col-lg-5">
            <h3><?php echo e(trans('adminlte_lang::message.address')); ?></h3>
            <p>
                Oficina Central, Centro Comercial Norte PA Oficina 412<br/>
                Telefonos: 591.3.340.08.23  - 591.708.96.707,<br/>
                jhinojosa'@'hinox-software.com<br/>
                Santa Cruz Bolivia
            </p>
        </div>

        <div class="col-lg-7">
            <h3><?php echo e(trans('adminlte_lang::message.dropus')); ?></h3>
            <br>
            <form role="form" action="#" method="post" enctype="plain">
                <div class="form-group">
                    <label for="name1"><?php echo e(trans('adminlte_lang::message.yourname')); ?></label>
                    <input type="name" name="Name" class="form-control" id="name1" placeholder="<?php echo e(trans('adminlte_lang::message.yourname')); ?>">
                </div>
                <div class="form-group">
                    <label for="email1"><?php echo e(trans('adminlte_lang::message.emailaddress')); ?></label>
                    <input type="email" name="Mail" class="form-control" id="email1" placeholder="<?php echo e(trans('adminlte_lang::message.enteremail')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(trans('adminlte_lang::message.yourtext')); ?></label>
                    <textarea class="form-control" name="Message" rows="3"></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-large btn-success"><?php echo e(trans('adminlte_lang::message.submit')); ?></button>
            </form>
        </div>
    </div>
</div>
<div id="c">
    <div class="container">
        <p>
            <strong>Copyright &copy; 2016 <a href="http://www.hinox-software.com">HINOX Software</a>.</strong>
            <br/>
            <br/>
             
        </p>

    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo e(asset('/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
