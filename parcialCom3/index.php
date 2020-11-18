<?php
     include('header.php');
     include_once('Config/Autoload.php');
     session_start();
     
?>
<main class="d-flex align-items-center justify-content-center height-100">
    <div class="content">
        <header class="text-center">
            <h2>Primer Parcial</h2>
        </header>
        <?php      if($_SESSION){
          if ($_SESSION['message']){
               echo $_SESSION['message'];
          }

     } ?>

        <form action="index-action.php" method="post" class="login-form bg-dark-alpha p-5 bg-light">
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control form-control-lg" placeholder="Ingresar usuario"
                    required>
            </div>
            <div class="form-group">
                <label for="">Contraseña</label>
                <input type="password" name="pass" class="form-control form-control-lg"
                    placeholder="Ingresar constraseña" required>
            </div>
            <button class="btn btn-primary btn-block btn-lg" type="submit">Iniciar Sesión</button>
        </form>
    </div>
</main>

<?php
     include('footer.php')
?>