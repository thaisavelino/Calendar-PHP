<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/style.css">
    
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
        $month = new App\Date\Month($_GET['month'] ?? null, $_GET['year'] ?? null);
            // se tem o valor pega se não o default é null
            // Agora pode passaar pela URL -> http://localhost:8001/?month=10&year=2012

?>
    <div class="container">
        <h1><?= $month->toString(); ?></h1>
        <!-- < ? = $month->getWeeks(); ?> -->
    
        
        <table class="table col-md-12 text-center">
            <?php for ($i = 0; $i < $month->getWeeks(); $i++): ?>
            <tr class="">
                <td class="">Seg</td>
                <td class="">Ter</td>
                <td class="">Qua</td>
                <td class="">Qui</td>
                <td class="">Sex</td>
                <td class=""> Sab</td>
                <td class="">Dom</td>
            </tr>
            <?php endfor; ?>
        </table>
    </div>
</body>
</html>