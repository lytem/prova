software 
gestione ambulatorio

A)gestione risorse(CRUD)

    1)web controller

       -doctors
       -patient
       -appuntamenti
       -esami
       -reparti
       -specialità
  
    2)webservice
       -specialità

B) Aspetti
    1)logging:
       logging file path:storage\app.log

    2)securità
        a)authentificazione:
           -user:writer,reader
        b)autorizzazione
           -writer:create retreive update delete tutte le risorce
           -reader: retreive
        c)seeder
           -seeder Path:seeders\permissionDemoSeeder.php

    3)validazione
        -alcuni campi sono obbligatori




