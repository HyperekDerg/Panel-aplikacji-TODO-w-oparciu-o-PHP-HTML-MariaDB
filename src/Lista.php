

<?php
   include("auth.php");
   $id = $_SESSION['id_user'];
   ?>
<!DOCTYPE html>
<html lang="pl">
   <head>
      <meta charset="utf-8">
      <title>Lista - TO DO</title>
      <link rel="stylesheet" href="../stock/css/styles.css" />
      <link rel="icon" href="../stock/img/favicon.png">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Listy Panelu">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   </head>
   <body class="dashboard">
      <div>
      <?php 
         if ($_SESSION['is_admin'] === '1') {
            ?>
      <nav>
         <div>
            <div class="side-nav">
               <a href="./Strona_Główna.php" class="logo">
               <img  class="logo-img" src="../stock/img/favicon.png" alt="Logo">
               </a>
               <div>
                  <a class="dashboard-link" href='./Strona_Główna.php'>
                     <div>
                        <h3 class="nav-text">Strona Główna</h3>
                     </div>
                  </a>
               </div>
               <div>
                  <a class="dashboard-link" href='./Lista.php'>
                     <div>
                        <h3 class="nav-text">Lista</h3>
                     </div>
                  </a>
               </div>
               <div>
                  <a class="dashboard-link" href='./Użytkownicy.php'>
                     <div>
                        <h3 class="nav-text">Użytkownicy</h3>
                     </div>
                  </a>
               </div>
               <div>
                  <a class="dashboard-link" href='./Wylogowanie.php'>
                     <div>
                        <h3 class="nav-text">Wyloguj</h3>
                     </div>
                  </a>
               </div>
            </div>
         </div>
      </nav>
      <div class="container">
      <h3>Twoje zadania:</h3>
      <?php
         require('../config/config.php');
         $sql = "SELECT * FROM to_do WHERE id_users='$id'";
         $result = $con->query($sql);
         
         if ($result->num_rows > 0) {
         ?>
      <div class="center">
         <table>
         <tr>
            <th>Zadanie</th>
            <th>Data dodania:
            <th>Usuń</th>
            <th>Edytuj</th>
         </tr>
         <?php
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["dane"]."</td><td>".$row["create_datetime"]."</td><td><input type='radio' name='id_listy' form='del' value='".$row["id_listy"]."'>"."</td><td><input type='radio' name='id_listy' form='edit' value='".$row["id_listy"]."'></td></tr>";
            }
            echo '</table>';
            echo '</div>';
            } else {
            echo 'Nie posiadasz jeszcze utworzonych zadań! Dodaj nowe.';
            }
            $con->close();
            ?>
      </div>
      <div class="add-container">
         <div class="flex-grid-thirds">
            <div class="col">
               <img src="../stock/img/add.png" alt="Dodaj">
               <a href="./Task.php" class="Function-link">
                  <div>
                     <h4>Dodaj nowe zadanie</h4>
                  </div>
               </a>
            </div>
            <div class="col">
               <img src="../stock/img/edit.png" alt="Edytuj zadanie">
               <div>
                  <input type="submit" value="Edytuj zaznaczone" name="submit" form="edit" class="del-button"/>
               </div>
            </div>
            <div class="col">
               <img src="../stock/img/del.png" alt="Usuń zadanie">
               <div>
                  <input type="submit" value="Usuń zaznaczone" name="submit" form="del" class="del-button"/>
               </div>
            </div>
         </div>
      </div>
      <form class="form" action="Lista_usun.php" method="post" id="del"></form>
      <form class="form" action="Lista_edytuj.php" method="post" id="edit"></form>
      <?php
         } else {
            ?>
      <nav>
         <div>
            <div class="side-nav">
               <a href="./Strona_Główna.php" class="logo">
               <img  class="logo-img" src="../stock/img/favicon.png" alt="logo">
               </a>
               <div>
                  <a class="dashboard-link" href='./Strona_Główna.php'>
                     <div>
                        <h3 class="nav-text">Strona Główna</h3>
                     </div>
                  </a>
               </div>
               <div>
                  <a class="dashboard-link" href='./Lista.php'>
                     <div>
                        <h3 class="nav-text">Lista</h3>
                     </div>
                  </a>
               </div>
               <div>
                  <a class="dashboard-link" href='./Wylogowanie.php'>
                     <div>
                        <h3 class="nav-text">Wyloguj</h3>
                     </div>
                  </a>
               </div>
            </div>
         </div>
      </nav>
      <div class="container">
         <h3>Twoje zadania:</h3>
         <?php
            require('../config/config.php');
            $sql = "SELECT * FROM to_do WHERE id_users='$id'";
            $result = $con->query($sql);
            
            if ($result->num_rows > 0) {
            ?>
         <div class="center">
            <table>
            <tr>
               <th>Zadanie</th>
               <th>Data dodania:
               <th>Usuń</th>
               <th>Edytuj</th>
            </tr>
            <?php
               while($row = $result->fetch_assoc()) {
                   echo "<tr><td>".$row["dane"]."</td><td>".$row["create_datetime"]."</td><td><input type='radio' name='id_listy' form='del' value='".$row["id_listy"]."'>"."</td><td><input type='radio' name='id_listy' form='edit' value='".$row["id_listy"]."'></td></tr>";
               }
               echo '</table>';
               echo '</div>';
               } else {
               echo 'Nie posiadasz jeszcze utworzonych zadań! Dodaj nowe.';
               }
               $con->close();
               ?>
         </div>
         <div class="add-container">
            <div class="flex-grid-thirds">
               <div class="col">
                  <img src="../stock/img/add.png" alt="Dodaj">
                  <a href="./Task.php" class="Function-link">
                     <div>
                        <h4>Dodaj nowe zadanie</h4>
                     </div>
                  </a>
               </div>
               <div class="col">
                  <img src="../stock/img/edit.png" alt="Edytuj zadanie">
                  <div>
                     <input type="submit" value="Edytuj zaznaczone" name="submit" form="edit" class="del-button"/>
                  </div>
               </div>
               <div class="col">
                  <img src="../stock/img/del.png" alt="Usuń zadanie">
                  <div>
                     <input type="submit" value="Usuń zaznaczone" name="submit" form="del" class="del-button"/>
                  </div>
               </div>
            </div>
         </div>
         <form class="form" action="Lista_usun.php" method="post" id="del"></form>
         <form class="form" action="Lista_edytuj.php" method="post" id="edit"></form>
         <?php
            }
            ?>
      </div>
   </body>
</html>

