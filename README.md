
# Panel Aplikacji TO DO

Jest to panel dla aplikacji działającej na podstawie bazę danych MariaDB, a także język PHP. Aby uruchomić projekt za pomocą XAMPP należy utworzyć główny katalog w htdocs, następnie do utworzonego katalogu przenieść repozytorium. 


## Połączenie z bazą danych

Wykorzystując phpmyadmin należy utworzyć nową bazę danych: panel_zaliczenie. Następnie zaimportować strukturę z lokalizacji:

```bash
  config/panel_zaliczenie.sql
```
Informacji o łączniu do bazy danych znajdują się w pliku 

```bash
  config/config.php
```    

```bash
  Domyślne dane dla administratora: 
  login: admin 
  hasło: admin
```    

