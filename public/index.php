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
        $month = new App\Date\Month(); /* chama construtor month */
    ?>
    <h1><?= $month->toString(); ?></h1>
</body>
</html>