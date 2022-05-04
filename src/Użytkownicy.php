

<?php
   include("auth.php");
   ?>
<!DOCTYPE html>
<html lang="pl">
   <head>
      <meta charset="utf-8">
      <title>Użytkownicy - TO DO</title>
      <link rel="stylesheet" href="../stock/css/styles.css" />
      <link rel="icon" href="../stock/img/favicon.png">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Użytkownicy">
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
         <h3>Użytkownicy:</h3>
         <?php
            require('../config/config.php');
            $sql = "SELECT * FROM users";
            $result = $con->query($sql);
            
            if ($result->num_rows > 0) {
            ?>
         <div class="center">
            <table>
            <tr>
               <th>Username</th>
               <th>Imie</th>
               <th>Nazwisko</th>
               <th>Hasło Zaszyfrowane</th>
               <th>Adres E-mail</th>
               <th class="no-td">Rola</th>
               <th>Usuń</th>
            </tr>
            <?php
               while($row = $result->fetch_assoc()) {
               
                  if ($row["is_admin"] === '1') {
                     $admin = 'Admin';
                  }else {
                     $admin = 'Użytkownik';
                  }
                   echo "<tr><td>".$row["username"]."</td><td>".$row["imie"]."</td><td>".$row["nazwisko"]."</td><td>".$row["haslo"]."</td><td>".$row["email"]."</td><td class='no-td'>".$admin."</td><td><input type='radio' name='user' form='del' value='".$row["id_user"]."'></td></tr>";
               }
               echo '</table>';
               echo '</div>';
               } else {
               echo '0 results';
               }
               $con->close();
               ?>
         </div>
         <div class="add-container">
            <div class="flex-grid-thirds">
               <div class="col"></div>
               <div class="col"></div>
               <div class="col">
                  <img src="../stock/img/del.png" alt="Zarządzanie listami">
                  <div>
                     <input type="submit" value="Usuń zaznaczone" name="submit" form="del" class="del-button"/>
                  </div>
               </div>
            </div>
         </div>
         <form class="form" action="user_usun.php" method="post" id="del"></form>
         <?php
            } else {
                echo ("Nie masz dostępu do tej strony.");
            }
            ?>
      </div>
   </body>
</html>

