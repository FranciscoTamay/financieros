@extends('layaout.master')
@section('content')
<form id="xmlForm">
<div class="mb-3">
  <label for="xmlFile" class="form-label">Ingrese su archivo XML</label>
  <input class="form-control" name="archivo"  type="file" id="xmlFile" accept=".xml">
  <input type="submit" value="Cargar" class="btn btn-primary btn-lg" >
</div>
</form>

<table class="table table-stripred">
  <thead>
    <tr>
      <th>Fecha</th>
      <th>RFC</th>
      <th>Nombre de la empresa</th>
      <th>Producto</th>
      <th>Importe</th>

    </tr>
  </thead>
  <tbody>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
  </tbody>
</table>
@endsection
@section('scripts')
<script>
  
document.getElementById('xmlForm').addEventListener('submit',function(event){
  event.preventDefault();
  var fileInput = document.getElementById('xmlFile');
  var file = fileInput.files[0];

  if (file) {
    var reader = new FileReader();

    reader.onload=function(event){
      var contenidoXML = event.target.result;

      var parser = new DOMParser();
      var xmlDoc =  parser.parseFromString(contenidoXML,'text/xml');

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

      var datos={
        fecha:fecha,
        rfc:rfc,
        razon_social:razon_social,
        producto:producto,
        importe:importe

      };

      console.log(datos);

      // Enviar la solicitud AJAX al controlador de Laravel
      var url = '/guardarXML'; // Ruta del controlador de Laravel para guardar los datos
      var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Obtener el token CSRF de Laravel

      fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-Token': token
        },
        body: JSON.stringify(datos)
      })
      .then(response => response.json())
      .then(data => {
        // Manejar la respuesta del controlador de Laravel
        console.log(data);
        // ... Hacer algo con la respuesta ...
      })
      .catch(error => {
        console.error(error);
        // ... Manejar el error ...
      });

    };

    reader.readAsText(file);
  }
});
</script>
@endsection