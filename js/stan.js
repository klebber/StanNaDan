function findGetParameter(parameterName) {
    var url = new URL(document.location.href);
    var search_params = url.searchParams;
    return search_params.get(parameterName);
}

function ucitajPodatkeOStanu() {
    $.get(
        "ucitajStan.php", {
            id: findGetParameter('id')
        },
        function(data) {
            if(data == "error") {
                window.location.href="error.php";
                return;
            }
            var obj = JSON.parse(data);
            $("#naziv").html(obj.naziv);
            $("#opis").html(obj.opis);
            $("#opis").html(obj.opis);
            $("#lokacija").html("Ulica: " + obj.ulica + "<br/>Broj: " + obj.broj + "<br/>Tip: " + obj.tip);
            $("#slika").attr("src", "img/stanovi/"+obj.id+".jpg");
        }
    );
}