$(document).ready(function(){

})

function editar(id_produto) {
    var passarvalor = function(valor){
     window.location = "produtos.php?id_prod="+valor
    }
    passarvalor(id_produto)
}

function excluir(id_produto) {
  
  var res = confirm('Deseja realmente EXCLUIR esse Produto?')
  if (res == true) {
    $.getJSON('excluirProduto.php',{
        produto: id_produto
    },function(data) {
        if (data.status == true) {
            $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
            $('#msg').attr('class', 'alert alert-error')
            $('#msg').text(data.msg)
          setInterval(function(){
            $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
            window.location = "listaProdutos.php"
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
    )
  }  
}
    
function tratardata(dt){
  return dt.split('-')[2]+'/'+dt.split('-')[1]+'/'+dt.split('-')[0]
}
