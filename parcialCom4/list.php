<?php
include('header.php');
include('nav.php');
include_once('Config/Autoload.php');
     use Model\Book as Book;
     use Repository\BookRepository as BookRepository;
session_start();
if($_SESSION){
     $bookRepo = new BookRepository();
     $bookList = $bookRepo->getAll();
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Libros</h2>

               <table class="table bg-light">
                    <thead class="bg-dark text-white">
                         <th>Id</th>
                         <th>Titulo</th>
                         <th>Autor</th>
                         <th>Genero</th>
                         <th>Formato</th>
                    </thead>
                    <tbody>
                    <?php foreach($bookList as $book){ ?>
                         <tr>
                              <td><?php echo $book->getId(); ?></td>
                              <td><?php echo $book->getTitle(); ?></td>
                              <td><?php echo $book->getAuthor(); ?></td>
                              <td><?php echo $book->getGenre(); ?></td>
                              <td><?php echo $book->getFormat(); ?></td>
                         </tr>
                         
                    <?php } ?>                        
                    </tbody>
               </table>
          </div>
     </section>
</main>

<?php } else  {header("Location: index.php");}  include('footer.php') ?>
