<?php $id = isset($_GET['id']) ? $_GET['id'] : 0; ?>
<?php require('userdata.php'); ?>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
<link href="../styles/additional.css">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item px-3">
          <a class="nav-link active" aria-current="page" href= <?php echo "http://localhost/Programaci%C3%B3n/loginBasile/index.php?id=".$id ?>>
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="45" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
            </svg>
          </a>
        </li>

        <li class="nav-item px-3">
          <a class="nav-link fs-3 lato-thin" href= <?php echo "http://localhost/Programaci%C3%B3n/loginBasile/view/forum/foro.php?id=".$id ?>>Foro</a>
        </li>
        

        <li class="nav-item px-3">
          <a class="nav-link fs-3" href= <?php echo "http://localhost/Programaci%C3%B3n/loginBasile/view/forum/crear.php?id=".$id ?>>Crear Publicacion</a>
        </li>

        <li class="nav-item px-3">
          <a class="nav-link fs-3" href= <?php echo "http://localhost/Programaci%C3%B3n/loginBasile/view/user/userList.php?id=".$id ?>>Usuarios</a>
        </li>

        
    </ul>

    <?php if(isset($_SESSION['regularUser']) || isset($_SESSION['administrador']) && $id != '0') {?>

      <?php if ($id != $_SESSION['id']) {
        header('Location: http://localhost/Programaci%C3%B3n/loginBasile/includes/botonCerrar.php?envio=1');
      } ?>

        <div class="dropdown px-5">
    <a class="nav-link dropdown-toggle" href='#' role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <img class="rounded-circle" height="50" width="50" alt="wo" src=" <?php echo $fila2->profile_pic ?>"/>  
    </a>
    <ul class="nav-item dropdown-menu">
        <li><a class="dropdown-item" href= <?php echo "http://localhost/Programaci%C3%B3n/loginBasile/view/user/cuenta.php?id=".$id."&cuenta=".$id ?>>Tu perfil</a></li>
        <li><a class="dropdown-item" href= <?php echo "http://localhost/Programaci%C3%B3n/loginBasile/view/user/change.php?id=".$id ?>>Administrar perfil</a></li>
        <li><a class="dropdown-item" href="http://localhost/Programaci%C3%B3n/loginBasile/includes/botonCerrar.php?envio=1">Cerrar sesión</a></li>
    </ul>
    </div>

    <?php } else { ?>

        <text class="fw-medium px-2">¿No tienes una cuenta?</text><a class="nav-item px-2" href="http://localhost/Programaci%C3%B3n/loginBasile/view/loginRegister/register.php">🖋Registrarse</a>
        <a class="nav-item px-2" href="http://localhost/Programaci%C3%B3n/loginBasile/view/loginRegister/login.php">🖥Iniciar Sesión</a>


    <?php } ?>
      
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    


