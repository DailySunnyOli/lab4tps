<?php
 include('header.php');
 include_once('Config/Autoload.php');
 session_start();
  ?>

     <main class="d-flex align-items-center justify-content-center height-100" >
          <div class="content">
               <header class="text-center">
                    <h2>Primer Parcial - 2020/ Com 4</h2>
               </header>
               <?php if(isset($message)){
            ?> <p> <?php echo $message ?> </p> <?php
        } ?>
        

               <form action="<?= ROOT_CLIENT ?>Process/logIn.php" method="post" class="login-form bg-dark-alpha p-5 bg-light">
                    <div class="form-group">
                         <label for="email">Usuario</label>
                         <input type="text" name="email" class="form-control form-control-lg" placeholder="Ingresar usuario">
                    </div>
                    <div class="form-group">
                         <label for="pass">Contraseña</label>
                         <input type="password" name="pass" class="form-control form-control-lg" placeholder="Ingresar constraseña">
                    </div>
                    <button class="btn btn-primary btn-block btn-lg" type="submit">Iniciar Sesión</button>
               </form>
          </div>
     </main>

<?php
 include('footer.php')
?>
