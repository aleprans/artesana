function editar(id_cliente) {
    var passarvalor = function(valor){
     window.location = "clientes.php?id_cli="+valor
    }
    passarvalor(id_cliente)
}


function excluir(id_cliente) {
    var res = confirm("Deseja escluir esse Cliente?")
    if (res == true) {
        $.getJSON('excluirCliente.php',{
            id_cliente: id_cliente
        },function(data) {
            if (data.status == true) {
                $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
                $('#msg').attr('class', 'alert alert-success')
                $('#msg').text(data.msg)
              setInterval(function(){
                $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
                window.location = "listaClientes.php"
              }, 3000)
            }else {
                $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
                $('#msg').attr('class', 'alert alert-error')
                $('#msg').text(data.msg)
              setInterval(function(){
                $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
              }, 3000)
            }
        }
    )}
    
}

function agendar(id_cli) {
  
  var passarvalor = function(valor){
   window.location = "agenda.php?id_cli="+valor
  }
  passarvalor(id_cli)
}

  