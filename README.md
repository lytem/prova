Nome: Eliane Cognome:Temgoua Telefono:3804707829

software 
gestione ambulatorio

A)gestione risorse(CRUD)

    1)web controller

       -doctors
       -patient
       -appuntamenti
       -esami
       -reparti
       -specialit√†
  
    2)webservice
       -specialit√†

B) Aspetti
    1)logging:
       logging file path:storage\logs\app.log

    2)securit√†
        a)authentificazione:
           -user:writer,reader
        b)autorizzazione
           -writer:create retreive update delete tutte le risorce
           -reader: retreive
        c)seeder
           -seeder Path:seeders\permissionDemoSeeder.php

    3)validazione
        -alcuni campi sono obbligatori


    4)Database
        backup Path: SQL\temgoua.sql

