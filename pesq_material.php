<?php
include_once('connect.php');

function retorna($id_material, $connect) {
    
    if ($id_material == 0) {
        return json_encode(null);
    }
    $sql = "select m.*, t.cat_mat from materiais as m , tipo_mat as t where m.id_material = '$id_material' and m.id_tipo = t.id_tipo_mat;";
    $resultado = mysqli_query($connect, $sql);
    $row_material = mysqli_fetch_assoc($resultado);
    $dados['desc'] = $row_material['desc_mat'];
    $dados['tipo'] = $row_material['id_tipo'];
    $dados['comp'] = $row_material['largura'];
    $dados['val'] = $row_material['valor'];
    $dados['cat'] = $row_material['cat_mat'];

    return json_encode($dados);
}

if (isset($_GET['material'])) {
    echo retorna($_GET['material'], $connect);
}

?>