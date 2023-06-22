<!DOCTYPE html>
<html>
<head>
    <title>Importar Alumnos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
       
        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ __($error) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#importModal">
            IMPORTAR ALUMNOS DESDE EXCEL
        </button>
        <!-- Modal -->
        <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title" id="importModalLabel">IMPORTAR DATOS DESDE UN EXCEL</h5>
                        <button type="button " class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                  

                        <form method="POST" action="/import" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="file">Asegurate que el formato sea el correcto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file">
                                    <label class="custom-file-label" for="file">SELECCIONA O ARRASTRA AQUI.</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Importar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.custom-file-input').on('change', function() {
                var fileName = $(this).val().split('\\').pop();
                $(this).siblings('.custom-file-label').addClass('selected').html(fileName);
            });

            @if ($errors->has('file'))
                alert('El archivo debe ser de tipo: xls, xlsx');
            @endif
        });
    </script>
    <script>
        document.getElementById('xmlForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Evitar que el formulario se envíe de forma predeterminada

  var fileInput = document.getElementById('xmlFile');
  var file = fileInput.files[0]; // Obtener el archivo seleccionado por el usuario

  if (file) {
    var reader = new FileReader();

    reader.onload = function(event) {
      var contenidoXML = event.target.result;

      // Crear una instancia de DOMParser para analizar el contenido XML
      var parser = new DOMParser();
      var xmlDoc = parser.parseFromString(contenidoXML, 'text/xml');

      // Obtener los valores necesarios del XML
      var receptorElement = xmlDoc.getElementsByTagName('cfdi:Receptor')[0];
      var rfc = receptorElement.getAttribute('Rfc');
      var nombre = receptorElement.getAttribute('Nombre');

      // Crear un objeto con los datos a enviar al controlador de Laravel
      var datos = {
        rfc: rfc,
        nombre: nombre
      };

      // Enviar la solicitud AJAX al controlador de Laravel
      var url = '/guardar-xml'; // Ruta del controlador de Laravel para guardar los datos
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

    reader.readAsText(file); // Leer el contenido del archivo como texto
  }
});

    </script>
</body>
</html>