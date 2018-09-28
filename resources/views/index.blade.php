<!doctype html>
<html lang="es">
<head>

    <title>Lista de Pendientes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <style type="text/css">
        body {
            background-image: url(images/wood-texture-id-3023.jpg);
        }
    </style>


</head>
<body>
<div class="container-fluid">
    <div class="gridContainer clearfix">
        <div id="LayoutDiv1"><center>
            <div class="jumbotron" style="background:transparent; background-image: url(images/block.png); height: 700px; width: 550px; >

            <div class="container"><br /><br /><br />
                        <h3>Lista de Pendientes</h3>
                        <img src="images/red-underline-png.png">
                        <form action="{{route('famsa.create')}}" method="post">
                            @csrf
                            <label>Teclee su Pendiente:</label>
                            <input type="text" ng-model="Pendientes" placeholder="Teclee su Pendiente" name="pendiente" class="form-control">
                            <br />
                            <button class="btn btn-success w-50 float-right">Guardar Pendiente</button></form><br />
                        <hr>
                <table align="center" width="500">
                    <tr>
                        <td>Status</td>
                        <td>Tarea</td>
                    </tr>
                    @foreach($famsa as $famsa)
                        <tr>
                            @if ($famsa->estatus == "0")
                                <td><form action="tasks/{{ $famsa->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        <button class="btn btn-primary btn-success" alt="Marcar como Realizada"><i class="glyphicon glyphicon-check"></i></button></td>
                                </form>
                                <td>{{ $famsa->pendiente }}</td>
                            @else
                                <td>
                                    <form action="tasks/{{ $famsa->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        <button class="btn btn-primary btn-danger" alt="Marcar como No Realizada"><i class="glyphicon glyphicon-minus"></i></button></td>
                                <td><s>{{ $famsa->pendiente }}</s></td>
                                </form>
                            @endif

                            <td>	<form action="tasks/{{ $famsa->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-primary btn-danger">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </button>
                                </form> </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" align="center">Tareas Pendientes:
                            <h2>  {{ $famsa->where("estatus", 0)->count() }} </h2>
                        </td>

                    </tr>
                </table>
        </div>
            </div></div></div></div></center>



</body>
</html>