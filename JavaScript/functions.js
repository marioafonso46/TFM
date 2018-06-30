function doLike(foto_id, id_user, likes, num) {
    $.post("likes.php", {foto_id: foto_id, id_user: id_user, likes: likes}, function( data ) {
        console.log(data);
    });
    $("#likes-number".concat(num)).html(likes+1);
}

function sendComment(foto_id, email)
{
comment = document.getElementById('comentario');

$.post("enviarComentario.php", {foto_id: foto_id, email: email, comentario: comment.value}, function( data ) {
    console.log(data);
});


}