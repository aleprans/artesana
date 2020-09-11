<?php
include_once('connect.php');

if (isset($_GET['id_cliente'], $connect)) {
    echo retorna($_GET['id_cliente'], $connect);

}

function retorna($cliente, $connect){

    $sql = "SELECT id_cliente from agenda where id_cliente = '$cliente' and conc = 0 ;";
    $verifage = mysqli_query($connect, $sql);
    $rowsage = mysqli_num_rows($verifage);

    $sql = "SELECT id_cliente from servicos where id_cliente = '$cliente' ;";
    $verifserv = mysqli_query($connect, $sql);
    $rowserv = mysqli_num_rows($verifserv);

    if ($rowserv <= 0 && $rowsage <= 0) {
        $sql = "DELETE FROM clientes WHERE id_cliente = '$cliente'";
        $resultado = mysqli_query($connect, $sql);

        if ($resultado) {
            echo json_encode(['status'=>true, 'msg'=>'Dados Excluidos com Sucesso!']);
            mysqli_close($connect);
        }else {
            echo json_encode(['status'=>false, 'msg'=>'Conexão Falhou!']);
            mysqli_close($connect);
        }
    }else {
        echo json_encode(['status'=>false, 'msg'=>'Cliente não pode ser excluido! Há serviços/agendamentos vinculados a ele.']);
        mysqli_close($connect);
    }
}
?>