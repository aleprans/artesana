$tipo = $('#tip')
$mat = $('#mat')
$larg = $('#larg')
$comp = $('#comp')
$val = $('#val')
$env = $('#enviar')

function limpar(){
    $larg.attr('disabled', true)
    $comp.attr('disabled', true)
    $val.attr('disabled', true) 
    $env.attr('disabled', true)
}
$tipo.on('change', function(){
    if ($tipo.val() > 1000) {
        $tipo2 = $tipo.val()-1000
    }else {
        $tipo2 = $tipo.val()
    }
    limpar()

    $('#mat').html('<option>Selecione um material</option>')
    // $('#mat').append('<option>'+'Selecione um material'+'<option>')
$.getJSON('pesq_mat.php',{
    tipo: $tipo2
}, function(json){
    for (i=0; i < json.length; i++){
        $('#mat').append('<option>'+json[i].desc+'</option>')    
    }
         
    })
})

$mat.on('change', function(){
    if ($mat.val() == 0) {
        $larg.attr('disabled', true)
        $comp.attr('disabled', true)
        // $val.attr('disabled', true)
        $env.attr('disabled', true)
    }else {
        if ($tipo.val() < 1000){
            $larg.attr('disabled', true)
            $comp.attr('disabled', true)
            // $val.attr('disabled', false)
            $env.attr('disabled', false)
        }else {
            $larg.attr('disabled', false)
            $comp.attr('disabled', false)
            // $val.attr('disabled', false)
            $env.attr('disabled', false)
        }
    }
})
// Mascaras valores
$val.mask('#.##0,00', {reverse: true})