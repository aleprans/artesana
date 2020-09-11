$(document).ready(function() {
  // $('#prod').select2()
  carregar()
})

// Passar ID pelo url
function editar(id_mat_util) {
  var passarvalor = function(valor){
   window.location = "util_mat.php?id_mat="+valor
  }
  passarvalor(id_mat_util)
}

// Pesquisa ID na url
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

//Variaveis comuns
var $id_produto = queryString("id_prod")
var $prod = $('#prod')
var $desc = $('#desc')
var $tab = $('#tab')
var $addmat = $('#addmat')
var $valc = $('#valc')
var $val = $('#val')
var $data = $('#dat')
var $env = $('#enviar')

$('#prod').on('change',function() {
  
  if ($(this).val() == 0) {
    $desc.attr('disabled', true)
    $addmat.attr('disabled', true)
    $valc.attr('disabled', true)
    $val.attr('disabled', true)
    $env.attr('disabled', true)
    window.location = "produtos.php"

  } else {
    $desc.attr('disabled', false)
    $addmat.attr('disabled', false)
    $valc.attr('disabled', false)
    $val.attr('disabled', false)
    $env.attr('disabled', false)
  } 
})

function carregar(){
if ($id_produto) {
    $.getJSON('pesq_produto.php', {
    produto: $id_produto
  },function(json) {
    $prod.val(json.prod)
    $desc.val(json.desc)
    $valc.val(json.custo)
    $val.val(json.venda)
    $data.val(json.data)
    
    $desc.attr('disabled', false)
    $addmat.attr('disabled', false)
    $valc.attr('disabled', false)
    $val.attr('disabled', false)
    $addmat.attr('disabled', false)
    $env.attr('disabled', false)
  })
  $.getJSON('pesq_util_mat.php', {
    produto: $id_produto
  }, function(json){
    var $tabela = document.getElementById('tab')
      
      for (let key = 0; key < json.length; key++) {
       
        var $rows = $tabela.insertRow()
        $rows.innerHTML ="<td>"+json[key].desc+
        "</td><td>"+json[key].larg+
        "</td><td>"+json[key].comp+
        "</td><td>"+json[key].qtde+
        "</td><button class='btn btn-primary btn-sm' onclick='add_material("+json[key].id_mat+
        ")'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btn-sm' onclick='excluir("+json[key].id_mat+
        ")'><i class='fa fa-trash'></i></button></td>"
      }
  })
}
}

//Mascara do valor
$('#val').mask('#.##0,00', {reverse: true});
$('#valc').mask('#.##0,00', {reverse: true})

// Limpar
function limpar(){
  if ($prod.val() == 0){
    window.location = 'listaProdutos.php'
  }else {
    window.location ='produtos.php'
  }
}

//Validando campos
function validar() {
  $desc.attr('style', 'border-color:gren')
  $valc.attr('style', 'border-color:gren')
  $val.attr('style', 'border-color:gren')
  $data.attr('style', 'border-color:gren')
  
  var msg = "Campo inválido!"

  if ($desc.val().length < 5) {
    $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
    $('#msg').attr('class', 'alert alert-error')
    $('#msg').text(msg)
  setInterval(function(){
    $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
  }, 3000)
    $desc.focus()
    $desc.attr('style', 'border-color:red')
    exit
  }
  if ($valc.val() <= 0) {
    $('#msg').attr('style', 'opacity:1; transition:opacity 2s' )
    $('#msg').attr('class', 'alert alert-error')
    $('#msg').text(msg)
  setInterval(function(){
    $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
  }, 3000)
    $valc.focus()
    $valc.attr('style', 'border-color:red')
    exit
  }

  if ($val.val() <= 0 || $val.val() <= $valc.val()) {
    $('#msg').attr('style', 'opacity:1; transition:opacity 2s' )
    $('#msg').attr('class', 'alert alert-error')
    $('#msg').text(msg)
  setInterval(function(){
    $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
  }, 3000)
    $val.focus()
    $val.attr('style', 'border-color:red')
    exit
  }

  enviar()
}

// Textos em maiusculo

$('#prod').blur(function() {
  var tx = $('#prod').val()
  $('#prod').val(tx.toUpperCase())
})

// Envia dados para o Banco de Dados
function enviar(){

  var $vtot = $val.val().replace(",",".")
  var $vcust = $valc.val().replace(",",".")

  var form_data = new FormData()

  form_data.append('id_produto', $id_produto)
  form_data.append('produto', $prod.val())
  form_data.append('desc', $desc.val())
  form_data.append('custo', $vcust)
  form_data.append('venda', $vtot)

  $.ajax({
    url: 'incluirProduto.php',
    type: 'post',
    dataType: 'json',
    enctype: 'multipart/form-data',
    processData: false,
    contentType: false,
    cache: false,
    data: form_data,
    success:function(data){

      if(data.status == true){
        $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
        $('#msg').attr('class', 'alert alert-success')
        $('#msg').text(data.msg)
      setInterval(function(){
        $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
        window.location = "listaProdutos.php"
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
  })
}

