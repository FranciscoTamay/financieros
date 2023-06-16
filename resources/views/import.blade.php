<html>
<head>
    <title>Importar Alumnos</title>
</head>
<body>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="/import" enctype="multipart/form-data">
        @csrf

        <input type="file" name="file">
        <button type="submit">Importar</button>
    </form>
</body>
</html>