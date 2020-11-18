<?php
include('header.php');
include('nav.php');
include_once('Config/Autoload.php');
use Repository\CareerRepository as CareerRepository;
use Model\Career as Career;
session_start();
if($_SESSION['loggedUser']){
     $carreerRepo = new CareerRepository();
     $carreerList = $carreerRepo->getAvailable();
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <form action="student-add-action.php" method="post">
          <div class="container">
               <h3 class="mb-3">Agregar Alumno</h3>

               <div class="bg-light p-4">
                    <div class="row">
                         <div class="col-lg-3">
                      
                              <label for="">Carrera</label>
                              <select name="idCarreer" class="form-control form-control-ml">
                              <?php  foreach ($carreerList as $carreer) { ?>
                                   <option value="<?php echo $carreer->getCareerId();?>"><?php echo $carreer->getName();?></option>
                              <?php } ?>
                              </select>
                         </div>                         
                         
                         <div class="col-lg-3">
                              <label for="">Apellido</label>
                              <input type="text" name="lasName" class="form-control form-control-ml" required value="">
                         </div>

                         <div class="col-lg-3">
                              <label for="">Nombre</label>
                              <input type="text" name="name" class="form-control form-control-ml" required value="">
                         </div>

                         <div class="col-lg-3">
                              <label for="">Email</label>
                              <input type="email" name="email" class="form-control form-control-ml" required value="">
                         </div>
                         <div class="col-lg-3">
                              <span>&nbsp;</span>
                              <button type="submit" name="" class="btn btn-primary ml-auto d-block">Agregar</button>
                         </div>

                    </div>                    
               </div>
          </div>
          </form>
     </section>
</main>

<?php  } else {
     $_SESSION['message'] = "No está autorizado a entrar en esta página";
     header ("Location: index.php");

} include('footer.php') ?>
