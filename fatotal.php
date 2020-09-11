<?php
include_once('connect.php');

function retorna($dtini, $dtfin, $fin, $connect) {
    if ($dtini == "") {
        $dtini = "1900-01-01";
    }

    if ($dtfin == "") {
        $dtfin = date('Y-m-d');
    }

    if ($fin == 2) {
        $sqltot = "SELECT sum(valor_pecas) as vpec, sum(valor_total) as vtot, sum(vcust_peca) as cpec from servicos where dat_exec between '$dtini' and '$dtfin';";
    }else {
        $sqltot = "SELECT sum(valor_pecas) as vpec, sum(valor_total) as vtot, sum(vcust_peca) as cpec from servicos where dat_exec between '$dtini' and '$dtfin' and fim = $fin;";
    }
    $resultado = mysqli_query($connect, $sqltot);
    $row_totais = mysqli_fetch_assoc($resultado);
    $dados['vpec'] = $row_totais['vpec'];
    $dados['vtot'] = $row_totais['vtot'];
    $dados['cpec'] = $row_totais['cpec'];

    return json_encode($dados);

}

if (isset($_GET['dtini'])) {
    echo retorna($_GET['dtini'], $_GET['dtfin'], $_GET['fin'], $connect);
}
?>