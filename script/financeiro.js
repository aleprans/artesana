var $dtini = $('#dtini')
var $dtfin = $('#dtfim')
var $fin = $('#fin')
var $fatotal = $('#fatotal')
var $cpec = $('#cpec')
var $vpec = $('#vpec')
var $vmb = $('#vmb')
var msg = "Campo inválido!"
    
$(document).ready(function(){
    geral()
})

function geral(){
$.getJSON('fatotal.php',{
        dtini: '1900-01-01',
        dtfin: hoje(),
        fin: '2'
    },function(data){
        var $tot = parseFloat(data.vtot)
        var $vp = parseFloat(data.vpec)
        var $cp = parseFloat(data.cpec)
        var $fmb = $tot - $vp 
        $fatotal.val(numberToReal($tot))
        $cpec.val(numberToReal($cp))
        $vpec.val(numberToReal($vp - $cp))
        $vmb.val(numberToReal($fmb))
    }

)}

function limparfiltro(){
    $dtini.val("")
    $dtfin.val("")
    $fin.val(2)
    geral()
}
function filtrar() {
    
    $dtini.attr('style', 'border-color:gren')
    $dtfin.attr('style', 'border-color:gren')

    $.getJSON('fatotal.php',{
        dtini: $dtini.val(),
        dtfin: $dtfin.val(),
        fin: $fin.val()
    },function(data){
        if (data.vtot == null){
            $fatotal.val(numberToReal(0))
            $cpec.val(numberToReal(0))
            $vpec.val(numberToReal(0))
            $vmb.val(numberToReal(0))
        }else {
            var $tot = parseFloat(data.vtot)
            var $vp = parseFloat(data.vpec)
            var $cp = parseFloat(data.cpec)
            var $fmb = $tot - $vp 
            $fatotal.val(numberToReal($tot))
            $cpec.val(numberToReal($cp))
            $vpec.val(numberToReal($vp - $cp))
            $vmb.val(numberToReal($fmb))
        }

    })
}
function numberToReal(numero) {
    var numero = numero.toFixed(2).split('.');
    numero[0] = "R$ " + numero[0].split(/(?=(?:...)*$)/).join('.');
    return numero.join(',');
}
function hoje(){
    var dNow = new Date();
    if (dNow.getMonth() < 10) {
        var $mes = '0'+(dNow.getMonth()+1)
    }
    var localdate = dNow.getFullYear() + '-' + $mes + '-' + dNow.getDate();
    return localdate;
}