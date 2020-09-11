<?php
include_once('connect.php');

function retorna($connect, $id_produto){

$sql = "select m.desc_mat, u.larg, u.comp, u.qtde from util_mat as u inner join  materiais as m on u.id_mat = m.id_material where u.id_prod = '$id_produto';";
$resultado = mysqli_query($connect, $sql);
$row = mysqli_fetch_all($resultado);

foreach($row as $key=>$valor){

    $dados[$key]['desc'] = $valor[0]; 
    $dados[$key]['larg'] = $valor[1];
    $dados[$key]['comp'] = $valor[2];
    $dados[$key]['qtde'] = $valor[3];
}
    return json_encode($dados);
}

if (isset($_GET['produto'])) {
    echo retorna($connect, $_GET['produto']);
}
?>