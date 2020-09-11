<?php

include_once('connect.php');

function retorna($connect, $tipo){

$sqldesc = "select m.desc_mat, m.id_material from materiais as m, tipo_mat as t where m.id_tipo = '$tipo' group by m.desc_mat;";
$result = mysqli_query($connect, $sqldesc);
$row = mysqli_fetch_all($result);

foreach($row as $key=>$valor){

    $dados[$key]['desc'] = $valor[0]; 
    $dados[$key]['id_mat'] = $valor[1];
}
    return json_encode($dados);
}

if (isset($_GET['tipo'])) {
    echo retorna($connect, $_GET['tipo']);
}
?>