

<?php
   include("auth.php");
   ?>
<?php
   require('../config/config.php'); 
   
   if(isset($_POST['user']))
   {
   $id = $_POST['user'];
   $sql = "DELETE FROM users WHERE id_user='$id'";
   
   if ($con->query($sql) === TRUE) {
   header("Location: Użytkownicy.php");
   } else {
   echo "Napotkano problem!" . $con->error;
   echo "Skontaktuj się z Administratorem strony aby rozwiązać problem."
   ?>
<a style='text-decoration: none; color: white;' href='./Użytkownicy.php'>
   <div class='error-button'>Kliknij aby spróbować jeszcze raz.</div>
</a>
<?php
   }
   } else {
   header("Location: Użytkownicy.php");
   }
   
   $con->close();
   ?>

