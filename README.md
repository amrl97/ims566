# ims566
e-leave Staff UiTM

# Tutorial Project - Leave Application System

A sample tutorial project that create a web application for Leave Application System. This system will process the application details and present it in a formal correspondence. The Correspondence also can be download as PDF.

## Author

-   [@amrl97](https://github.com/amrl97)

## Features

-   [x] CRUD generated
-   [x] Admin access
-   [x] User access
-   [x] Form customization
-   [x] Search
-   [x] PDF correspondence
-   [x] Approval function
-   [x] QR Code for sharing

## Run Locally

Clone the project

```bash
  git clone https://github.com/amrl97/ims566.git
```

Create database in `phpmyadmin`

Configure database

```bash
    'Datasources' => [
        'default' => [
            'host' => 'localhost',
            'port' => 'non_standard_port_number',
            'username' => 'root',
            'password' => '',
            'database' => 'ims',
            'url' => env('DATABASE_URL', null),
        ],
```

Database migration

```bash
  bin/cake migrations migrate
```

Database seeding

```bash
  bin/cake migrations seed
```

Default account Info

```bash
  admin@localhost.com | 123456
```

## Acknowledgements

-   [ReCRUD](https://github.com/Asyraf-wa/recrud)
-   [Code The Pixel Youtube](https://www.youtube.com/@codethepixel)
-   [Code The Pixel](https://codethepixel.com/)

