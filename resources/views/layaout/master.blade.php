<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=0.9" />
    <title>@yield('title')Inicio</title>
    <link rel="icon" type="image/png" href="otros/path4490.png">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/datatable.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <nav>
        <a href="#">Inicio</a>
        <a href="xml">xml</a>
        <a href="alumnos">Alumnos</a>
        <button class="modo" id="modoToggle"><i class="fa-solid fa-moon"></i></button>
    </nav>
    <div class="contenido">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://kit.fontawesome.com/c892f5f399.js" crossorigin="anonymous"></script>
    <script src="js/master.js"></script>
    <script>
        // Obtener el botón de cambio de modo
        var modo = document.getElementById("modoToggle");

        // Añadir un listener de eventos al botón
        modo.addEventListener("click", function() {
            // Obtener el elemento raíz
            var rootElement = document.documentElement;

            // Alternar la clase "dark" en el elemento raíz
            rootElement.classList.toggle("dark");

            // Obtener el ícono dentro del botón
            var icono = modo.querySelector("i");

            // Cambiar el ícono según el modo
            if (rootElement.classList.contains("dark")) {
                icono.className = "fa-solid fa-sun";
                localStorage.setItem("modo", "dark");
            } else {
                icono.className = "fa-solid fa-moon";
                localStorage.setItem("modo", "claro");
            }
        });

        // Verificar la preferencia del modo guardada en el localStorage
        var preferenciaModo = localStorage.getItem("modo");
        if (preferenciaModo === "dark") {
            // Si la preferencia es modo oscuro, añadir la clase "dark" al elemento raíz
            document.documentElement.classList.add("dark");

            // Obtener el ícono dentro del botón
            var icono =  modo.querySelector("i");
            icono.className = "fa-solid fa-sun";
        }
    </script>
    @yield('scripts')
</body>

</html>