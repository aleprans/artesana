$(document).ready(function() {
  $('#mat').select2()
})

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
var $id_material = queryString("id_mat")
var $mat = $('#mat')
var $desc = $('#desc')
var $comp = $('#comp')
var $val = $('#val')
var $env = $('#enviar')

$('#mat').on('change',function() {

  if ($(this).val() == 0) {
    $desc.attr('disabled', true)
    $comp.attr('disabled', true)
    $val.attr('disabled', true)
    $env.attr('disabled', true)
  }else if ($(this).val() <=99) {
    $comp.attr('disabled', true)
    $desc.attr('disabled', false)
    $val.attr('disabled', false)
    $env.attr('disabled', false)
  }else {
    $desc.attr('disabled', false)
    $comp.attr('disabled', false)
    $val.attr('disabled', false)
    $env.attr('disabled', false)
  } 
})

if ($id_material) {
  
   $.getJSON('pesq_material.php', {
    material: $id_material
  },function(json) {
    $desc.val(json.desc)
    $comp.val(json.comp)
    $val.val(json.val)
    $mat.val((json.cat + json.tipo)).trigger('change')

    if (json.cat < 100) {
      $comp.attr('disabled', true)
    }else {
      $comp.attr('disabled', false)
    }
    $desc.attr('disabled', false)
    $val.attr('disabled', false)
    $env.attr('disabled', false)
    
  })
}

//Mascara do valor
$('#val').mask('#.##0,00', {reverse: true});

// Limpar dados
function limpar(){
  
  if ($id_material != undefined){
    window.location = 'listaMateriais.php'
  }else{
    if ($mat.val() == 0) {
      window.location = 'listaMateriais.php'
    }else{
    $mat.val(0).trigger('change')
    }
  }
}

//Validando campos
function validar() {
  $desc.attr('style', 'border-color:gren')
  $comp.attr('style', 'border-color:gren')
  $val.attr('style', 'border-color:gren')
  
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

  if ($val.val() <= 0 ) {
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
  if ($mat.val() != 2 && $comp.val() <= 0 ) {
    $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
    $('#msg').attr('class', 'alert alert-error')
    $('#msg').text(msg)
  setInterval(function(){
    $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
  }, 3000)
    $comp.focus()
    $comp.attr('style', 'border-color:red')
    exit
  }
  enviar()
}

// Envia dados para o Banco de Dados
function enviar(){
  if ($mat.val() > 1000){
  $mat2 = $mat.val()-1000
  }else{
    $mat2 = $mat.val()
  }
 
  var $vtot2 = $val.val().replace(",",".")
  var form_data = new FormData()
  
  form_data.append('id_material', $id_material)
  form_data.append('id_tipo', $mat2)
  form_data.append('desc', $desc.val())
  form_data.append('comp', $comp.val())
  form_data.append('val', $vtot2)

  $.ajax({
    url: 'incluirMaterial.php',
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
        window.location = "listaMateriais.php"
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
