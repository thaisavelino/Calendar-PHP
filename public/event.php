<?php
// Página front de visualização dos detalhes do evento
require '../src/bootstrap.php';
$pdo = get_pdo();
$events = new Calendar\Events($pdo);
if (!isset($_GET['id'])) {
    header('location: /404.php');
}
try {
    $event = $events->find($_GET['id']);
} catch (\Exception $e) {
    e404();
}

// header vem depois, se não quando der 404 chamará ele duas vezes na pagina
// tambem estamos colocando o titulo da pagina com o nome do evento, para quando clicar em detalhes
render('header', ['title' => $event->getName()]);
?>
<h1><?= h($event->getName()); ?></h1>

<ul>
  <li>Date: <?= $event->getStart()->format('d/m/Y'); ?></li>
  <li>Heure de démarrage: <?= $event->getStart()->format('H:i'); ?></li>
  <li>Heure de fin: <?= $event->getEnd()->format('H:i'); ?></li>
  <li>
    Description:<br>
      <?= h($event->getDescription()); ?>
      <!---Metodo h() evita que usuario adicione tag html -->
  </li>
</ul>

<?php require '../views/footer.php'; ?>
