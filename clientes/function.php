<?php

require_once('../config.php');
require_once(DBAPI);

$clientes = null;
$cliente = null;

/**
 *  Listagem de Clientes
 */
function index() {
	global $clientes;
	$clientes = find_all('clientes');
}

