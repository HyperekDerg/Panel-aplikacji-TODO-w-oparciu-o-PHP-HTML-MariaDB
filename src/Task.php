

<?php
   include("auth.php");
   ?>
<!DOCTYPE html>
<html lang="pl">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Dodaj nowe zadanie</title>
      <link rel="stylesheet" href="../stock/css/styles.css">
      <link rel="icon" href="../stock/img/favicon.png">
      <meta name="description" content="Dodaj nowe zadanie">
   </head>
   <body class="register">
      <?php
         require('../config/config.php');
         if (isset($_REQUEST['dane'])) {
             $dane           = stripslashes($_REQUEST['dane']);
             $dane = mysqli_real_escape_string($con, $dane);
             $user = $_SESSION['id_user'];
             $create_datetime = date("Y-m-d H:i:s");
             
                 
                 $query  = "INSERT into `to_do` (id_users, dane, create_datetime)
                              VALUES ('$user', '$dane', '$create_datetime')";
                 $result = mysqli_query($con, $query);
                 
                 if (!$result) {
                     echo "<div>
                     <h3 class='error'>Błąd dodawania!</h3><br/>
                     <a style='text-decoration: none; color: white;' href='Task.php'><div class='error-button'>Kliknij aby spróbować jeszcze raz.</div></a>
                     </div>";
                     
                 } else {
                     header("Location: Lista.php");
                 }
         } else {
         ?>
      <form class="form" action="" method="post" id="Task">
         <h1 class="register-title">Dodaj nowe zadanie</h1>
         <p>Maksymalnie można wprowadzić 50 znaków.</p>
         <textarea rows="5" name="dane" form="Task" maxlength="50" required class="register-input" placeholder="Wpisz tutaj zadanie..."></textarea>
         <input type="submit" name="submit" value="Dodaj" form="Task" class="register-button">
         <a style='text-decoration: none; color: white;' href='Lista.php'>
            <div class='add-button' id="sized" >Anuluj</div>
         </a>
      </form>
      <?php
         }
         ?>
   </body>
</html>

