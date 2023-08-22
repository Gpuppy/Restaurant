<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);


$app->get('/db', function(Request $request, Response $response, LoggerInterface $logger, Twig $twig, PDO $pdo) {
    $st = $pdo->prepare('SELECT name FROM test_table');
    $st->execute();
    $names = array();
    while($row = $st->fetch(PDO::FETCH_ASSOC)) {
        $logger->debug('Row ' . $row['name']);
        $names[] = $row;
    }
    return $twig->render($response, 'database.twig', [
        'names' => $names,
    ]);
});
