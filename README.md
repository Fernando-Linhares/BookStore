# BookStore

   This app is for register of books rental of one book store. Therefore created with php
pure and own architecture but buildered for be like to frameworks architeture as laravel,
symfony, yii-framework and more.

  ## The folder structure:
    
  >  To Mvc layer archteture

        app/
            Controllers/
            Models/
                Entity/
                Repositories/
            views/

  >  To dependences and services
    src/


   When app is initialized you can verify file on **routes/routes.php** there is where routes
called in application. However you should create file *.env* to keep all variables environments,
this file must be like that:

        APPNAME=book_store_app
        HOST=localhost
        PORT=5432
        USERNAME=your_name
        PASSWORD=your_password
        DATABASE=your_database
        DEBUG=1
        PRODUCTION=0
        DEVELOPMENT=1

   For use binary to make faster development you can see in folder **bin/**, there is where have
the commands to create migrations, create seeds, seed to database, migrate tables.

For create seeds and migrations use the command:

      $ php bin/migration [MIGRATION_NAME]

or

      $ php project migration [MIGRATION_NAME]
and

      $ php bin/seeder [SEEDER_NAME]
or

      $ php project seeder [SEEDER_NAME]

To both commands use:

      $ php project both [NAME_BOTH]

For create seed and migrate use the command:

      $ php bin/migrate

or

      $ php project migrate
and

      $ php bin/seed
or

      $ php project seed

To both commands use:

      $ php project up


   Seeders and Migrations can be configured sequence on **config/seeders.php** and
**config/migrations.php** and his schemes can me created in **database/Migrations/[NAME_FILE]**
and **database/Seeders/[NAME_FILE]**.