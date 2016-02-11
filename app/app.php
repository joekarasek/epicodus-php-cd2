<?php

	require_once __DIR__.'/../vendor/autoload.php';
	require_once __DIR__.'/../src/CD.php';

	session_start();
	if(empty($_SESSION['list_of_cds'])) {
		$_SESSION['list_of_cds'] = array();
	}

	$app = new Silex\Application();

	$app->register(new Silex\Provider\TwigServiceProvider(), array(
		'twig.path' => __DIR__.'/../views'
	));

	$app->get('/', function() use ($app){
		return $app['twig']->render('home.html.twig');
	});

	$app->get('/new_cd', function() use ($app){
		return $app['twig']->render('new_cd.html.twig');
	});

	$app->post('/cd_inserted', function() use ($app){
		$cd = new CD($_POST['album'], $_POST['artist']);
		$cd->save();

		$cd_list = CD::getAll();
		return $app['twig']->render('home.html.twig', array(
			'cds' => $cd_list
		));
	});

	return $app;

?>
