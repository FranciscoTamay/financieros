@extends('layaout.master')
@section('content')
<div class="container">
    <form action="">
        <h2 id="miH2"></h2>
    </form>
</div>
@endsection
@section('scripts')
<script>
    var fechaActual = new Date();
    // obtenemos el dia, mes y año
    var dia = fechaActual.getDate();
    var mes = fechaActual.getMonth() + 1;
    var anio = fechaActual.getFullYear();
    // obtenemos la hora minutos y segunsos
    var horas = fechaActual.getHours();
    var minutos = fechaActual.getMinutes();
    var segundos = fechaActual.getSeconds();

    var amOpm = horas >= 12? "PM" : "AM";
    horas = horas % 12||12;

    var fechaFormateada = dia + "/" + mes + "/" + anio;
    var horaFormateada = horas + ":" + minutos + ":" + segundos + amOpm;

    var elementoH2 = document.getElementById("miH2");
    
    elementoH2.textContent = fechaFormateada + " " + horaFormateada;
</script>
@endsection