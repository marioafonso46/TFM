function doLike(foto_id, id_user, likes) {
    $.post("likes.php", {foto_id: foto_id, id_user: id_user, likes: likes}, function( data ) {
        console.log(data);
    });
    $("#likes-number").html(likes+1);
}