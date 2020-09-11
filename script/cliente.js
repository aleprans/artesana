// Variaveis em Comuns
var $env = $('#enviar')
var $nam = $("#nome")
var $tel = $("#tel")
var $end = $("#end")
var $num = $("#num")
var $bar = $("#bar")
var $cid = $("#cid")
var $est = $("#est")
var $idc = $("#id_cli")

// Abilitar campos
function abilitar(){
  $nam.attr('disabled', false)
  $end.attr('disabled', false)
  $num.attr('disabled', false)
  $bar.attr('disabled', false)
  $cid.attr('disabled', false)
  $est.attr('disabled', false)
  $idc.attr('disabled', false)
  $tel.attr('disabled', false)
  $env.attr('disabled', false)
}

// Desabilitar campos
function desabilitar(){
  $nam.attr('disabled', true)
  $end.attr('disabled', true)
  $num.attr('disabled', true)
  $bar.attr('disabled', true)
  $cid.attr('disabled', true)
  $est.attr('disabled', true)
  $idc.attr('disabled', true)
  $tel.attr('disabled', true)
  $env.attr('disabled', true)
}

// Limpar url
function limpar(){
  if ($tel.val()){
    window.location = "clientes.php"
  }else {
    window.location = "listaClientes.php"
  }
}

// Enviar dados pro Banco de Dados
function enviar(){
    
var form_data = new FormData();
form_data.append('id_cli', document.getElementById('id_cli').value);
form_data.append('nome', document.getElementById('nome').value);
form_data.append('tel', document.getElementById('tel').value);
form_data.append('end', document.getElementById('end').value);
form_data.append('num', document.getElementById('num').value);
form_data.append('bar', document.getElementById('bar').value);
form_data.append('cid', document.getElementById('cid').value);
form_data.append('est', document.getElementById('est').value);
  
$.ajax({
  url:'incluirCliente.php',
  type:'post',
  dataType:'json',
  enctype: 'multipart/form-data',
  processData: false,
  contentType: false,
  cache: false,
  data:form_data,
  success:function(data){
    
    if(data.status == true){
      $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
      $('#msg').attr('class', 'alert alert-success')
      $('#msg').text(data.msg)
      setInterval(function(){
        $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
        window.location = "listaClientes.php"
      }, 3000)
    }else{
      $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
      $('#msg').attr('class', 'alert alert-error')
      $('#msg').text(data.msg)
    setInterval(function(){
      $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
      }, 3000)
    }
  },
  error:function(e){
    console.log(e)
  }
});

// Validação de campos obrigatórios
}
function validar() {
  var msg = "Campo Inválido!"

  $tel.attr('style', 'border-color:gren')
  $nam.attr('style', 'border-color:gren')

  if ($tel.val().length < 14) {
    $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
    $('#msg').attr('class', 'alert alert-error')
    $('#msg').text(msg)
  setInterval(function(){
    $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
  }, 3000)
    $tel.focus()
    $tel.attr('style', 'border-color:red')
    exit
  }

  
  if ($nam.val() == "") {
    $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
    $('#msg').attr('class', 'alert alert-error')
    $('#msg').text(msg)
  setInterval(function(){
    $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
  },3000)
    $nam.focus()
    $nam.attr('style', 'border-color:red')
    exit
  }
enviar()
}
 
// Pesquisar ID na url
 
$(document).ready(function(){
  function queryString(parameter) {
    var loc = location.search.substring(1, location.search.length)
    var param_value = false
    var params = loc.split("&")
    for (i=0; i<params.length; i++) {
        param_name = params[i].substring(0,params[i].indexOf('='))
        if (param_name == parameter) {
            param_value = params[i].substring(params[i].indexOf('=')+1)
        }
    }
    if (param_value) {
        return param_value
    } else {
        return undefined
    }
  }
  var id_cliente = queryString("id_cli")

  // Pesquisa Cliente pela url

  
  if (id_cliente != undefined) {
    
    $.getJSON('pesq_cliente.php', {
      id_cliente: id_cliente
    },function(json) {
      $nam.val(json.nom)
      $tel.val(json.tel)
      $end.val(json.end)
      $num.val(json.num)
      $bar.val(json.bar)
      $cid.val(json.cid)
      $est.val(json.est)
      $idc.val(json.id_cli)
      abilitar()
  })}else {

// Pesquisa Cliente por tel

  $('#tel').focus()
  $('#tel').blur(function() {
    $.getJSON('pesq_cliente.php', {
      cliente: $(this).val()
    },function(json) {
      $nam.val(json.nom)
      $tel.val(json.tel)
      $end.val(json.end)
      $num.val(json.num)
      $bar.val(json.bar)
      $cid.val(json.cid)
      $est.val(json.est)
      $idc.val(json.id_cli)
      })
      $nam.val("")
      $end.val("")
      $num.val("")
      $bar.val("")
      $cid.val("")
      $est.val("")
      $idc.val("")
      abilitar()
      $nam.focus()
    })
    
  }

  // // Textos em maiusculos

  $('#nome').blur(function() {
    var tx = $('#nome').val()
    $('#nome').val(tx.toUpperCase())
  })

  $('#end').blur(function() {
    var tx = $('#end').val()
    $('#end').val(tx.toUpperCase())
  })
  
    $('#num').blur(function() {
    var tx = $('#num').val()
    $('#num').val(tx.toUpperCase())
  })

    $('#bar').blur(function() {
    var tx = $('#bar').val()
    $('#bar').val(tx.toUpperCase())
  })
  
    $('#cid').blur(function() {
    var tx = $('#cid').val()
    $('#cid').val(tx.toUpperCase())
  })
  
  $('#est').blur(function() {
    var tx = $('#est').val()
    $('#est').val(tx.toUpperCase())
  })
})