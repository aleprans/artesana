// Variaveis em Comuns
var $env = $('#enviar')
var $exc = $('#excluir')
var $nom = $("#nome")
var $usu = $("#usuario")
var $sen = $("#sen")
var $csen = $("#csen")
var $id_usu = $('#id_usu')
var $niv = $('#nivel')
var $nivlog = $('#nivlog')
var $usulog = $('#usulog')

//Abilitar campos
function abilitar(){
  if ($nivlog.val() == 0) {
    $usu.attr('disabled', true)
    $nom.attr('disabled', true)
    $sen.attr('disabled', false)
    $csen.attr('disabled', false)
    $env.attr('disabled', false)

  }else if ($nivlog.val() == 1 && $usu.val() != $usulog.val() ){
    $nom.attr('disabled', false)
    $sen.attr('disabled', true)
    $csen.attr('disabled', true)
    $env.attr('disabled', false)
    $exc.attr('disabled', false)
    $niv.attr('disabled', false)
  }else if ($nivlog.val() == 1 && $usu.val() == $usulog.val() ){
    $nom.attr('disabled', false)
    $sen.attr('disabled', false)
    $csen.attr('disabled', false)
    $env.attr('disabled', false)
    $exc.attr('disabled', true)
    $niv.attr('disabled', true)
  }

}

// Desabilitar campos
function desabilitar(){
  if ($nivlog.val() == 0) {
    window.location = 'usuario.php'
  }else{
  $nom.attr('disabled', true)
  $sen.attr('disabled', true)
  $csen.attr('disabled', true)
  $env.attr('disabled', true)
  $exc.attr('disabled', true)
  $niv.attr('disabled', true)
  $usu.attr('disabled', false)
  $usu.focus()
  }
}

// Enviar dados pro Banco de Dados
function enviar(){

var form_data = new FormData()
form_data.append('id_usuario', $id_usu.val())
form_data.append('usuario', $usu.val())
form_data.append('nome', $nom.val())
form_data.append('senha', $sen.val())
form_data.append('nivel', $niv.val())

$.ajax({
  url:'incluirUsuario.php',
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
        window.location = "usuario.php"
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
}

// Validação de campos obrigatórios
function validar() {
  var msg = "Campo Inválido!"

  $usu.attr('style', 'border-color:gren')
  $nom.attr('style', 'border-color:gren')
  $sen.attr('style', 'border-color:gren')
  if ($nivlog.val() == 0) {
    validarSenha()
  }else if ($nivlog.val() == 1 && $usu.val() != $usulog.val() ){
    validarUsuario()
    validarNome()
  }else if ($nivlog.val() == 1 && $usu.val() == $usulog.val() ){
    validarUsuario()
    validarNome()
    if ($sen.val() != "") {
      validarSenha()
    }
  }

  function validarUsuario(){
    if ($usu.val().length < 4) {
      $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
      $('#msg').attr('class', 'alert alert-error')
      $('#msg').text(msg)
    setInterval(function(){
      $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
    }, 3000)
      $usu.focus()
      $usu.attr('style', 'border-color:red')
      exit
    }
  }
  function validarNome(){
    if ($nom.val() == "") {
      $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
      $('#msg').attr('class', 'alert alert-error')
      $('#msg').text(msg)
    setInterval(function(){
      $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
    },3000)
      $nom.focus()
      $nom.attr('style', 'border-color:red')
      exit
    }
  }
  function validarSenha(){
    if ($sen.val() < 4) {
      $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
      $('#msg').attr('class', 'alert alert-error')
      $('#msg').text(msg)
    setInterval(function(){
      $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
    },3000)
      $sen.focus()
      $sen.attr('style', 'border-color:red')
      exit
    }
    if ($csen.val() != $sen.val()) {
      $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
      $('#msg').attr('class', 'alert alert-error')
      $('#msg').text('Não confere com campo senha')
    setInterval(function(){
      $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
    },3000)
      $csen.focus()
      $csen.attr('style', 'border-color:red')
      exit
    }
  }
enviar()
}

// Pesquisa usuario por usuario
$(document).ready(function(){
  $('#usuario').focus()
  $('#usuario').blur(function(){
    $nom.val("")
    $niv.val(0)
    $.getJSON('pesq_usuario.php', {
      usuario: $(this).val()
    },function(json) {
      $nom.val(json.nome)
      $id_usu.val(json.id_usu)
      $niv.val(json.niv)
    })
      abilitar()      
    })

  $('#usuario').on('change', function(){
    $(this).attr('style', 'border-color:gren')
  })
  $('#nome').on('change', function(){
    $(this).attr('style', 'border-color:gren')
  })
  $('#sen').on('change', function(){
    $(this).attr('style', 'border-color:gren')
  })
  $('#csen').on('change', function(){
    $(this).attr('style', 'border-color:gren')
  })

 

})  
$.getJSON('pesq_nivel.php', {
  usuario: $usulog.val()
}, function(json){
  
  if (json.nivel == 0) {
    $usu.val(json.usuario)
    $niv.val(json.nivel)
    $nom.val(json.nome)
    abilitar()
    $sen.focus()
  }
})

// Excluir usuario

function deletar() {
  var conf = confirm("Deseja mesmo excluir esse usuário?")
  if (conf == true) {
    $.getJSON('excluirUsuario.php', {
      id_usu: $id_usu.val()
    },function(json){
      if (json.status == true) {
        $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
        $('#msg').attr('class', 'alert alert-success')
        $('#msg').text(json.msg)
        setInterval(function(){
          $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
          window.location ='usuario.php'
        },3000)
      }else{
        $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
        $('#msg').attr('class', 'alert alert-error')
        $('#msg').text(data.msg)
        setInterval(function(){
          $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
        }, 3000)
      }
    })
  }
}
