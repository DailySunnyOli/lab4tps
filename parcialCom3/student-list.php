<?php
include('header.php');
include('nav.php');
include_once('Config/Autoload.php');
use Repository\CareerRepository as CareerRepository;
use Model\Career as Career;
use Repository\StudentRepository as StudentRepository;
use Model\Student as Student;
session_start();
if($_SESSION['loggedUser']){
     $carreerRepo = new CareerRepository();
     $carreerList = $carreerRepo->getAll(); //porque no sé si cuando el estudiante se anotó la carrera estaba activa y ahora no
     $studentRepo = new StudentRepository();
     $studentList = $studentRepo->getAll();
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Alumnos</h2>

               <table class="table bg-light">
                    <thead class="bg-dark text-white">
                         <th>Carrera</th>
                         <th>Apellido</th>
                         <th>Nombre</th>
                         <th>Email</th>
                    </thead>
                    <tbody>
                         <tr>
                             <?php foreach($studentList as $student) {
                              foreach($carreerList as $career){ ?>
                              <td><?php if ($student->getIdCarreer() == $career->getCareerId()) echo $career->getName(); }?></td>
                              <td><?php echo $student->getName(); ?></td>
                              <td><?php echo $student->getLastName(); ?></td>
                              <td><?php echo $student->getEmail(); ?></td>
                             <?php }?>
                         </tr>
                    </tbody>
               </table>
          </div>
     </section>
</main>

<?php } else {
     $_SESSION['message'] = "No está autorizado a entrar en esta página";
     header ("Location: index.php");

} include('footer.php') ?>
