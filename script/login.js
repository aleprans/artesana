var $usuario = $('#usuario')
var $senha = $('#senha')
var $msg = $('#msg')
var msg = "Preenchimento obrigatório!"

function validar(){
    $usuario.attr('style', 'border-color:grey')
    $senha.attr('style', 'border-color:grey')

    if ($usuario.val() == "") {
        $msg.attr('style', 'opacity:1; transition:opacity 2s')
        $msg.text(msg)
        setInterval(function(){
            $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
        }, 3000)
            $usuario.focus()
            $usuario.attr('style', 'border-color:red')
            exit
    }
    if ($senha.val() == ""){
        $msg.attr('style', 'opacity:1; transition:opacity 2s')
        $msg.text(msg)
        setInterval(function(){
            $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
        }, 3000)
            $senha.focus()
            $senha.attr('style', 'border-color:red')
            exit
    }
       enviar()
     
}

function enviar(){
   
    var form_data = new FormData()

    form_data.append('usuario',$usuario.val())
    form_data.append('senha', $senha.val())

    $.ajax({
    url: 'login.php',
    type: 'post',
    dataType: 'json',
    enctype: 'multipart/form-data',
    processData: false,
    contentType: false,
    cache: false,
    data: form_data,
    success:function(data){
        
        if (data.status == 'falha') {
            $msg.attr('style', 'opacity:1; transition:opacity 2s')
            $msg.text(data.msg)
        setInterval(function(){
            $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
        }, 3000)
        }
        if (data.status == 'logado') {
            window.location = "inicial.php"
        }
    }
})
}