<?php
require '../vendor/autoload.php';

function e404 () {
    require '../public/404.php';
    exit(); //exit para não executar o resto do script
}

function dd(...$vars) {
    foreach($vars as $var) {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
}
/**
 * Function para criar conexão com DB
 *
 * @return PDO
 */
function get_pdo (): PDO {
    return new PDO('mysql:host=db;dbname=tutocalendar', 'root', 'root', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
}
/**
 * Previne Hacks.. html
 * Usamos "htmlentities" para evitar que o usuário adcione tags html
 * e eles sejam executadas
 *
 * tb verifica se está nulo, para não imprimir erro na tela
 * 
 * @param string|null $value
 * @return string
 */
function h(?string $value): string {
    if ($value === null) {
        return '';
    }
    return htmlentities($value);
}
/**
 * Função para encontrar a view (front) de cada pagina
 * e enviar os parâmetros que a página precisa
 * 
 * @param string $view
 * @param array $parameters
 * @return void 
 * Não retorna nada pois apenas faz um echo
 */
function render(string $view, $parameters = []) {
    extract($parameters);
    include "../views/{$view}.php";
}