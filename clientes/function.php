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
?>

<?php
/**
 *  Cadastro de Clientes
 */
function add() {

  if (!empty($_POST['customer'])) {
    
    $today = 
      date_create('now', new DateTimeZone('America/Sao_Paulo'));

    $customer = $_POST['customer'];
    $customer['modified'] = $customer['created'] = $today->format("Y-m-d H:i:s");
    
    save('customers', $customer);
    header('location: index.php');
  }
}
?>

<?php

/**
 *	Atualizacao/Edicao de Cliente
 */
function edit() {

  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

  if (isset($_GET['id'])) {

    $id = $_GET['id'];

    if (isset($_POST['cliente'])) {

      $cliente = $_POST['cliente'];
      $cliente['modified'] = $now->format("Y-m-d H:i:s");

      update('clientes', $id, $cliente);
      header('location: index.php');
    } else {

      global $cliente;
      $cliente = find('clientes', $id);
    } 
  } else {
    header('location: index.php');
  }
}
