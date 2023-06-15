<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{ route('cargar-xml') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div id="drop-zone">
        Arrastra o inserta aquí tu archivo XML
    </div>
    <input type="file" id="archivo" name="archivo" style="display: none;">
    <button type="submit">Cargar archivo</button>
</form>

<script>
    var dropZone = document.getElementById('drop-zone');

    dropZone.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropZone.classList.add('dragover');
    });

    dropZone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        dropZone.classList.remove('dragover');
    });

    dropZone.addEventListener('drop', function(e) {
        e.preventDefault();
        dropZone.classList.remove('dragover');
        var file = e.dataTransfer.files[0];
        document.getElementById('archivo').files = e.dataTransfer.files;
    });
</script>

</body>
</html>