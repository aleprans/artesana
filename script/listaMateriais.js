// passar ID pelo url
function editar(id_material) {
    var passarvalor = function(valor){
     window.location = "materiais.php?id_mat="+valor
    }
    passarvalor(id_material)
}

function excluir(id_mat) {
    var res = confirm("Deseja escluir esse Agendamento?")
    if (res == true) {
        $.getJSON('excluirMaterial.php',{
            id_mat: id_mat
        },function(data) {
            if (data.status == true) {
                $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
                $('#msg').attr('class', 'alert alert-success')
                $('#msg').text(data.msg)
              setInterval(function(){
                $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
                window.location = "listaMateriais.php"
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