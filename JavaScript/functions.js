function doLike(foto_id, id_user, likes) {
    $.post("prueba-likes.php", {foto_id: 1, id_user: "hollywoodrose94@hotmail.com", likes: 4}, function( data ) {
        console.log(data);
    });
}