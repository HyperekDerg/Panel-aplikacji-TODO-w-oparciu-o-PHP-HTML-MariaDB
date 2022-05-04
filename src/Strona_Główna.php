

<?php
   include("auth.php");
   ?>
<!DOCTYPE html>
<html lang="pl">
   <head>
      <meta charset="utf-8">
      <title>Główny Panel - TO DO</title>
      <link rel="stylesheet" href="../stock/css/styles.css" />
      <link rel="icon" href="../stock/img/favicon.png">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Strona główna Panelu">
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
            <h1>Witaj <?php echo $_SESSION['username']; ?></h1>
            <clock >
               <p style="display: inline;">Aktualna godzina: </p>
               <div id="clock" style="display: inline;"> 
               </div>
               <script>
                  function clock() {
                  let date = new Date();
                  let hrs = date.getHours();
                  let mins = date.getMinutes();
                  let period = "AM";
                  
                  if (hrs == 0) hrs = 12;
                  if (hrs > 12) {
                    hrs = hrs - 12;
                    period = "PM";
                  }
                  
                  hrs = hrs < 10 ? `0${hrs}` : hrs;
                  mins = mins < 10 ? `0${mins}` : mins;
                  
                  let time = `${hrs}:${mins} ${period}`;
                  setInterval(clock, 5000);
                  document.getElementById("clock").innerText = time;
                  }
                  
                  clock();
                  
               </script>
            </clock>
         </div>
         <div class="container">
            <h3>Dostępne funkcje:</h3>
            <div class="flex-grid-thirds">
               <div class="col">
                  <a href="./Użytkownicy.php" class="Function-link">
                     <img src="../stock/img/user.png" alt="Zarządzanie użytkownikami">
                     <div>
                        <h4>Zarządzanie użytkownikami</h4>
                        <p>Umożliwia sprawdzenie ile użytkonwików istnieje, oraz jakie role posiadają.</p>
                     </div>
                  </a>
               </div>
            </div>
            <div class="flex-grid-thirds">
               <div class="col">
                  <a href="./Lista.php" class="Function-link">
                     <img src="../stock/img/line-graph.png" alt="Zarządzanie listami">
                     <div>
                        <h4>Zarządzanie listami</h4>
                        <p>Dodawanie, usuwanie zadań z listy.</p>
                     </div>
               </div>
               </a>
            </div>
         </div>
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
            <h1>Witaj <?php echo $_SESSION['username']; ?></h1>
            <clock >
               <p style="display: inline;">Aktualna godzina: </p>
               <div id="clock" style="display: inline;"> 
               </div>
               <script>
                  function clock() {
                  let date = new Date();
                  let hrs = date.getHours();
                  let mins = date.getMinutes();
                  let period = "AM";
                  
                  if (hrs == 0) hrs = 12;
                  if (hrs > 12) {
                    hrs = hrs - 12;
                    period = "PM";
                  }
                  
                  hrs = hrs < 10 ? `0${hrs}` : hrs;
                  mins = mins < 10 ? `0${mins}` : mins;
                  
                  let time = `${hrs}:${mins} ${period}`;
                  setInterval(clock, 5000);
                  document.getElementById("clock").innerText = time;
                  }
                  
                  clock();
                  
               </script>
            </clock>
         </div>
         <div class="container">
            <h3>Dostępne funkcje:</h3>
            <div class="flex-grid-thirds">
               <div class="col">
                  <a href="./Lista.php" class="Function-link">
                     <img src="../stock/img/line-graph.png" alt="Zarządzanie listami">
                     <div>
                        <h4>Zarządzanie listami</h4>
                        <p>Dodawanie, usuwanie zadań z listy.</p>
                     </div>
                  </a>
               </div>
            </div>
         </div>
         <?php
            }
            ?>
      </div>
   </body>
</html>

