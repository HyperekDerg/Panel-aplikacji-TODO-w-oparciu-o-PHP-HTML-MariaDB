

<!DOCTYPE html>
<html lang="pl">
   <head>
      <meta charset="utf-8"/>
      <title>Login</title>
      <link rel="stylesheet" href="../stock/css/styles.css"/>
      <link rel="icon" href="../stock/img/favicon.png">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Strona logowania do Panelu">
   </head>
   <body class="register">
      <?php
         require('../config/config.php');
         session_start();
         if (isset($_POST['username'])) {
             $username = stripslashes($_REQUEST['username']);    
             $username = mysqli_real_escape_string($con, $username);
             $haslo = stripslashes($_REQUEST['haslo']);
             $haslo = mysqli_real_escape_string($con, $haslo);
             $query    = "SELECT * FROM `users` WHERE username='$username'
                          AND haslo='" . md5($haslo) . "'";
             $result = mysqli_query($con, $query) or die(mysqli_error($con));
             $rows = mysqli_num_rows($result);
             while($row = mysqli_fetch_assoc($result)) {
                 $is_admin = $row['is_admin'];
                 $id_users = $row['id_user'];
               }
             if ($rows == 1) {
                 $_SESSION['username'] = $username;
                 $_SESSION['is_admin'] = $is_admin;
                 $_SESSION['id_user'] = $id_users;
                 header("Location: Strona_Główna.php");
             } else {
                 echo "<div class='form'>
                       <h3 class='error'>Błędny login/hasło.</h3><br/>
                       <p class='link'>Naciśnij aby zalogować się jeszcze raz.</p>
                       <a style='text-decoration: none; color: white;' href='Logowanie.php'><div class='error-button'>Zaloguj się ponownie</div></a>
                       </div>";
             }
         } else {
         ?>
      <form class="form" method="post" name="login">
         <h1 class="register-title">Login</h1>
         <div>
            <p>Zaloguj się aby móc korzystać z panelu.</p>
         </div>
         <input type="text" class="register-input" name="username" placeholder="Username" autofocus="true"/>
         <input type="password" class="register-input" name="haslo" placeholder="Hasło"/>
         <input type="submit" value="Zaloguj się" name="submit" class="register-button"/>
         <p class="link"><a href="Rejestrowanie.php">Nie masz konta? Załóż je teraz.</a></p>
      </form>
      <?php
         }
         ?>
   </body>
</html>

