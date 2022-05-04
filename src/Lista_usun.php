

<?php
   include("auth.php");
   ?>
<?php
   require('../config/config.php');
   
   if(isset($_POST['id_listy']))
   {
   $id = $_POST['id_listy'];
   $sql = "DELETE FROM to_do WHERE id_listy='$id'";
   
   if ($con->query($sql) === TRUE) {
   header("Location: Lista.php");
   } else {
   echo "Napotkano problem!" . $con->error;
   echo "Skontaktuj się z Administratorem strony aby rozwiązać problem."
   ?>
<a style='text-decoration: none; color: white;' href='./Lista.php'>
   <div class='error-button'>Kliknij aby spróbować jeszcze raz.</div>
</a>
<?php
   }
   } else {
   header("Location: Lista.php");
   }
   
   $con->close();
   ?>

