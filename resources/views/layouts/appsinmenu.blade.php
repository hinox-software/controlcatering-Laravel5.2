<!DOCTYPE html>

<html lang="es">


<head>
    <meta charset="UTF-8">
    <title> Sistema OT - @yield('htmlheader_title', 'DATA RED') </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/skins/skin-blue.css') }}" rel="stylesheet" type="text/css" />


    <link href="/var/www/html/appsistemaOT/public/css/bootstrap.css" rel="stylesheet" type="text/css" />

    <link href="/var/www/html/appsistemaOT/public/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="/var/www/html/appsistemaOT/public/css/skins/skin-blue.css" rel="stylesheet" type="text/css" />
    

</head>

<body class="skin-blue sidebar-mini">
   
        <section class="content">
    
            @yield('main-content')
        </section>

</body>
</html>