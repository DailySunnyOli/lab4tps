<?php
include('header.php');
include('nav.php');
include_once('Config/Autoload.php');
session_start();
if($_SESSION){
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <form action="<?= ROOT_CLIENT ?>Process/add-book.php" method="POST">
          <div class="container">
               <h3 class="mb-3">Agregar Libro</h3>
               <?php if(isset($message)){
            ?> <p> <?php echo $message ?> </p> <?php
        } ?>

               <div class="bg-light p-4">
                    <div class="row">
                         <div class="col-lg-4">
                              <label for="id">Id</label>
                              <input type="number" name="id" class="form-control form-control-ml" required value="">
                         </div>                         

                         <div class="col-lg-4">
                              <label for="title">Titulo</label>
                              <input type="text" name="title" class="form-control form-control-ml" requiredvalue="">
                         </div>

                         <div class="col-lg-4">
                              <label for="author">Autor</label>
                              <input type="tex" name="author" class="form-control form-control-ml" required value="">
                         </div>

                         <div class="col-lg-4" >
                              <label for="genre">Genero</label>

                              <div class="form-group">
                                   <select name="genre" id="genre"  class="custom-select" required>
                                        <option>Informática</option>
                                        <option>Novela</option>
                                        <option>Historia</option>
                                   </select>
                              </div>                              
                         </div>                         

                         <div class="col-lg-4">
                              <label for="format">Formato</label> <br>
                              <label for="paper">Papel</label>
                              <input type="radio" name="format"  value="paper" checked>
                              <label for="digital">Digital</label>
                              <input type="radio" name="format"  value="digital">
                              <label for="both">Ambos</label>
                              <input type="radio" name="format" value="both">
                         </div>

                         <div class="col-lg-4">
                              <span>&nbsp;</span>
                              <button type="submit" name="" class="btn btn-primary ml-auto d-block">Agregar</button>
                         </div>

                    </div>                    
               </div>
          </div>
          </form>
     </section>
</main>

     <?php } else header ("Location: index.php"); include('footer.php') ?>
