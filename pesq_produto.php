<?php
include_once('connect.php');

function retorna($connect, $id_produto){

$sqlprod = "select * from produtos where id_produto = '$id_produto';";
$result_prod = mysqli_query($connect, $sqlprod);
$row_prod = mysqli_fetch_assoc($result_prod);

$dados['prod'] = $row_prod['produto'];
$dados['desc'] = $row_prod['descricao'];
$dados['custo'] = $row_prod['custo'];
$dados['venda'] = $row_prod['venda'];
$dados['cliente'] = $row_prod['cliente'];
$dados['data'] = $row_prod['data'];

return json_encode($dados);
}

if (isset($_GET['produto'])) {
    echo retorna($connect, $_GET['produto']);
}
?>