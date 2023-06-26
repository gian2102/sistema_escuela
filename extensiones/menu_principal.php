<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/sidemenu.css">
    <title>Sistema Escuela</title>
</head>

<body>
    <?php
        $url = "./head.php";
        include_once ($url);
    ?>
   <h1 class="title-modules">BIENVENIDO AL PANEL DE CONTROL</h1>
    <div id="main-container">
        <h1 class="title-modules">
            <?php echo $row['us_nombre'] ?>
        </h1>
    </div>
    <h1 class="title-modules">ADMINISTRADORES</h1>

    <script>
        const btn = document.querySelector('#menu-btn');
        const menu = document.querySelector('#sidemenu');
        btn.addEventListener('click', e => {
            menu.classList.toggle("menu-expanded");
            menu.classList.toggle("menu-collapsed");

            document.querySelector('body').classList.toggle('body-expanded');
        });
    </script>
</body>

</html>