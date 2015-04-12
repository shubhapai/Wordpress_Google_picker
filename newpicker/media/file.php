<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!file_exists('token.json')) {
	if (!$_GET['code']) {
		header('Location:' . $client->createAuthUrl(array('https://www.googleapis.com/auth/drive.file')));
		exit();
	}

	file_put_contents('token.json', $client->authenticate());
}

$client->setAccessToken(file_get_contents('token.json'));

$service = new apiDriveService($client);
$file = $service->files->get($_GET['id']);

try {
	$request = new apiHttpRequest($file->downloadUrl, 'GET', null, null);
	$httpRequest = apiClient::$io->authenticatedRequest($request);
	if ($httpRequest->getResponseHttpCode() != 200) {
		throw new Exception('HTTP Response code: ' . $httpRequest->getResponseHttpCode());
	}
	header('Content-Type: application/pdf');
	print $httpRequest->getResponseBody();
}
catch (Exception $e) {
	print $e->getMessage();
}
