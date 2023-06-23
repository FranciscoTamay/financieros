@extends('layaout.master')
@section('content')
<form id="xmlForm">
  <div class="mb-2">
    <label for="xmlFile" class="form-label">Ingrese su archivo XML</label>
    <input class="form-control" name="archivo" type="file" id="xmlFile" accept=".xml">
    <div class="col-md-4 offset-md-4">
      <div class="d-grid mx-auto">
        <button type="submit" class="btn btn-primary"><i class="fa-regular fa-file-import"></i> Cargar</button>
      </div>
    </div>
  </div>
</form>



<form id="frmConcentrado" method="post" action="guardarConcentrado" novalidate>
@csrf
  <div class="row">
    <div class="col-md-4 m-3">
      <label for="" class="form-label">Fecha</label>
      <input type="text" name="fecha" id="fecha" class="form-control mt-2 @error('fecha') is-invalid @enderror" value="{{old('fecha')}}" >
      @error('fecha')
      <span class="invalid-feedback">
        <strong>{{$message}}</strong>
      </span>
      @enderror
    </div>


    <div class="col-md-4 m-3">
      <label for="" class="form-label">RFC</label>
      <input type="text" name="rfc" id="rfc" class="form-control mt-2 @error('rfc') is-invalid @enderror" value="{{old('rfc')}}" readonly>
      @error('rfc')
      <span class="invalid-feedback">
        <strong>{{$message}}</strong>
      </span>
      @enderror
    </div>


    <div class="col-md-4 m-3">
      <label for="" class="form-label">Razon Social</label>
      <input type="text" name="razon_social" class="form-control mt-2 @error('razon_social') is-invalid @enderror" value="{{old('razon_social')}}" id="razon_social" readonly>
      @error('razon_social')
      <span class="invalid-feedback">
        <strong>{{$message}}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-4 m-3">
      <label for="" class="form-label">Producto</label>
      <input type="text" name="producto" class="form-control mt-2 @error('producto') is-invalid @enderror" value="{{old('producto')}}" id="producto" readonly>
      @error('producto')
      <span class="invalid-feedback">
        <strong>{{$message}}</strong>
      </span>
      @enderror
    </div>

    <div class="col-md-4 m-3">
      <label for="" class="form-label">Importe</label>
      <input type="text" name="importe" class="form-control mt-2 @error('importe') is-invalid @enderror" value="{{old('importe')}}" id="importe" readonly>
    </div>
    @error('importe')
      <span class="invalid-feedback">
        <strong>{{$message}}</strong>
      </span>
      @enderror

      <div class="col-md-4 m-3">
      <label for="" class="form-label">Partida</label>
      <input type="text" name="id_partida" class="form-control mt-2 @error('importe') is-invalid @enderror" value="{{old('id_partida')}}" id="importe" readonly>
    </div>
    @error('id_partida')
      <span class="invalid-feedback">
        <strong>{{$message}}</strong>
      </span>
      @enderror
    
    <input type="submit" class="btn btn-success" style="margin-top: 1rem; width: 100%;"  name="" id="" value="Enviar">
  </div>
</form>

@endsection
@section('scripts')
<script>
  document.getElementById('xmlForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var fileInput = document.getElementById('xmlFile');
    var file = fileInput.files[0];

    if (file) {
      var reader = new FileReader();

      reader.onload = function(event) {
        var contenidoXML = event.target.result;

        var parser = new DOMParser();
        var xmlDoc = parser.parseFromString(contenidoXML, 'text/xml');

        // obtenemos loa valores del xml 
        // obntengo el valor fecha
        var comporbanteElement = xmlDoc.getElementsByTagName('cfdi:Comprobante')[0];
        var fecha = comporbanteElement.getAttribute('Fecha');
        // obtengo los datos requeridos del receptor 
        var receptorElement = xmlDoc.getElementsByTagName('cfdi:Receptor')[0];
        var rfc = receptorElement.getAttribute('Rfc');
        var razon_social = receptorElement.getAttribute('Nombre');
        // obtenemos los datos del concepto 
        var conceptoElement = xmlDoc.getElementsByTagName('cfdi:Concepto')[0];
        var producto = conceptoElement.getAttribute('Descripcion');
        var importe = conceptoElement.getAttribute('Importe');

        var datos = {
          fecha: fecha,
          rfc: rfc,
          razon_social: razon_social,
          producto: producto,
          importe: importe

        };

        console.log(datos);

        // Asignamos los valores a los campos de entrada
        document.getElementById('fecha').value = fecha;
        document.getElementById('rfc').value = rfc;
        document.getElementById('razon_social').value = razon_social;
        document.getElementById('producto').value = producto;
        document.getElementById('importe').value = importe;





      };

      reader.readAsText(file);
    }
  });
</script>
@endsection