<?php

include_once('connect.php');

if (isset($_GET['id_age'])) {
    echo retorna($_GET['id_age'], $connect);
}

function retorna($id_age, $connect){

    $sql = "DELETE FROM agenda where id_agenda = '$id_age';";
    $result = mysqli_query($connect, $sql);

    if (!$result) {
        echo json_encode(['status'=> false, 'msg'=>'Erro de conexão']);
        mysqli_close($connect);
    }else {
        echo json_encode(['status'=> true, 'msg'=> 'Agendamento Excluido com Sucesso!']);
        mysqli_close($connect);
    }
}
?>