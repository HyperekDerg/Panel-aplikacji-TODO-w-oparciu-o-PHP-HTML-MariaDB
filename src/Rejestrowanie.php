

<!DOCTYPE html>
<html lang="pl">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Rejestracja</title>
      <link rel="stylesheet" href="../stock/css/styles.css">
      <link rel="icon" href="../stock/img/favicon.png">
      <meta name="description" content="Strona Rejestracji do Panelu">
   </head>
   <body class="register">
      <?php
         require('../config/config.php');
         if (isset($_REQUEST['username'])) {
             $username        = stripslashes($_REQUEST['username']);
             $username        = mysqli_real_escape_string($con, $username);
             $email           = stripslashes($_REQUEST['email']);
             $email           = mysqli_real_escape_string($con, $email);
             $haslo           = stripslashes($_REQUEST['haslo']);
             $haslo           = mysqli_real_escape_string($con, $haslo);
             $imie            = stripslashes($_REQUEST['imie']);
             $imie            = mysqli_real_escape_string($con, $imie);
             $nazwisko        = stripslashes($_REQUEST['nazwisko']);
             $nazwisko        = mysqli_real_escape_string($con, $nazwisko);
             $create_datetime = date("Y-m-d H:i:s");
             
             
             $query = "SELECT * FROM `users` WHERE username='$username'";
             $result = mysqli_query($con, $query) or die(mysqli_error($con));
             $rows = mysqli_num_rows($result);
             
             if ($rows == 1) {
                 echo "<div class='form'>
                     <h3 class='error'>Błąd rejestracji!</h3><br/>
                     <p class='link'>Istnieje już konto z taką samą nazwą użytkownika.</p>
                     <a style='text-decoration: none; color: white;' href='Rejestrowanie.php'><div class='error-button'>Kliknij aby zarejestrować się jeszcze raz.</div></a>
                     </div>";
             } else {
                 
                 $queryreg  = "INSERT into `users` (username, haslo, email, create_datetime, imie, nazwisko, is_admin)
                              VALUES ('$username', '" . md5($haslo) . "', '$email', '$create_datetime', '$imie', '$nazwisko', '0')";
                 $resultreg = mysqli_query($con, $queryreg);
                 
                 if (!$resultreg) {
                     echo "<div>
                     <h3 class='error'>Błąd rejestracji!</h3><br/>
                     <a style='text-decoration: none; color: white;' href='Rejestrowanie.php'><div class='error-button'>Kliknij aby zarejestrować się jeszcze raz.</div></a>
                     </div>";
                     
                 } else {
                     echo "<div>
                     <h3 class='succes'>Zostałeś zarejestrowany pomyślnie.</h3><br/>
                     <a style='text-decoration: none; color: white;' href='Logowanie.php'><div class='error-button'>Kliknij aby się zalogować</div></a>
                     </div>";
                 }
             }
         } else {
         ?>
      <form class="form" action="" method="post">
         <h1 class="register-title">Rejestracja</h1>
         <input type="text" class="register-input" name="username" placeholder="Username" required />
         <input type="email" class="register-input" name="email" placeholder="Adres E-mail" required>
         <input type="text" class="register-input" name="imie" placeholder="Imie" required>
         <input type="text" class="register-input" name="nazwisko" placeholder="Nazwisko" required>
         <input type="password" class="register-input" name="haslo" placeholder="Hasło" required>
         <input type="submit" name="submit" value="Zarejestruj" class="register-button">
         <p class="link"><a href="Logowanie.php">Kliknij aby się zalogować na istniejące konto.</a></p>
      </form>
      <?php
         }
         ?>
   </body>
</html>

