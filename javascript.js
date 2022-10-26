var setarInfo = function(){
    console.log("entrei no setarInfo");
    localStorage.setItem("email",document.getElementById("email").value);
    console.log(document.getElementById("email").value);
}
var pegarInfo =  function(){
    localStorage.getItem("email");
    let email = localStorage.getItem("email");
    console.log(email);
    var settings = {
        "url": "https://uniexpo.herokuapp.com/recuperaPerfil.php?email=" + email,
        "method": "GET",
        "timeout": 0,
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
    };

    $.ajax(settings).done(function (response) {
        console.log(response);
        var jx = JSON.parse(response);
        console.log(jx.perfis[0].nome);
        document.getElementById("nome").innerHTML = jx.perfis[0].nome;
        document.getElementById("curso").innerHTML = jx.perfis[0].curso;


    });

}