<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();
$response = $client->request('GET', 'https://www.alura.com.br/cursos-online-programacao/php');

echo $response->getStatusCode() . PHP_EOL;

$html = $response->getBody();

$crawler = new Crawler();
$crawler->addHtmlContent($html);

$cursos = $crawler->filter('span.card-curso_nome');

foreach ($cursos as $curso) {
  echo $curso->textContent . PHP_EOL;
}
