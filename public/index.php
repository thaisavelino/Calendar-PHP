<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Calendar PHP</title>
</head>
<body>
    <nav class="navbar navbar-dark mb-4"  style="background-color: #ff6b33;">
        <a href="/index.php" class="navbar-brand">
            <i class="fa fa-calendar" aria-hidden="true">
                Calendário Super Cool
            </i>
        </a>
    </nav>

    
    <?php
        require '../src/Date/Month.php'; /* Por enqunanto damos require aqui, depois vamos criar um autoloads */
        //$month = new App\Date\Month(02,1988); /* chama construtor month */
        try {
            $month = new App\Date\Month($_GET['month'] ?? null, $_GET['year'] ?? null); 
            // se tem o valor pega se não o default é null
            // Agora pode passaar pela URL -> http://localhost:8001/?month=10&year=2012
        } catch (\Exception $e) {
            $month = new App\Date\Month(); //se não conseguir pelo get, pega uma nova data
        }
    ?>
    <h1><?= $month->toString(); ?></h1>
</body>
</html>