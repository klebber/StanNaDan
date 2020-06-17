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
            $("#lokacija").html("Ulica: " + obj.ulica + "<br/>Broj: " + obj.broj + "<br/>Tip: " + obj.tip + "<br/>Cena: " + obj.cena + " €/dan");
            $("#slika").attr("src", "img/stanovi/"+obj.id+".jpg");
        }
    );
    getCurrentData();
    disableDates();
}

function getCurrentData() {
    var data = "{\"temp\": \"0\",\"hum\": \"0\",\"co2\": \"0\",\"light\": \"0\"}";
    // var stanId = findGetParameter('id');
    // $.get(
    //     "172.20.222.228:5000/getValue", {
    //         id: stanId
    //     },
    //     function(data) {
           $("#infoCard").css("display", "block");
           var json = JSON.parse(data);
           $("#informacije").html("Temperatura: " + json.temp + "<br>Vlaznost vazduha: " + json.hum + "<br>Nivo CO2: " + json.co2 + "<br>Osvetljenost: " + json.light);
    //     }
    // );
}

function disableDates() {
    $.get(
        "ucitajRezervacije.php", {
            stan: findGetParameter('id')
        },
        function(data) {
            if(data == "error") {
                window.location.href="error.php";
                return;
            }
            var obj = JSON.parse(data);
            var datumi = [];
            for (var i = 0, len = obj.length; i < len; ++i) {
                var rez = obj[i];
                datumi.push(rez[3]);
            }
            $('#calendar').datepicker({
                weekStart: 1,
                startDate: new Date(),
                todayHighlight: true,
                format: 'yyyy-mm-dd',
                datesDisabled: datumi
            }).on('changeDate', function(e) {
                if ($("#rezervacijaCard").css('display') != 'none') {
                    var date = $("#calendar").datepicker("getDate");
                    var yyyy = date.getFullYear().toString();
                    var mm = (date.getMonth()+1).toString();
                    var dd  = date.getDate().toString();
                    $("#datumvalue").html("Izabrani datum: " + dd + "." + mm + "." + yyyy);
                    $("#rezervacijabtn").prop('disabled', false);
                }
            });
        }
    );
}

$(document).ready(function() {
    $("#rezervacijabtn").click(function(){
        $.post(
            "obradiRezervaciju.php", {
                operacija: "dodavanje",
                stan: findGetParameter('id'),
                datum: $("#calendar").datepicker("getFormattedDate")
            },
            function(data) {
                if(data == "error") {
                    alert('Došlo je do greške prilikom rezervacije.');
                } else if(data == "success") {
                    window.location = "rezervacije.php";
                }
            }
        );
    });
});