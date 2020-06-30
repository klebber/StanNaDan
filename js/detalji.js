var test;
var troskovi;
var cena;

function ucitajPodatkeOStanu(stan) {
    $("#slika-small").attr("src", "img/stanovi/"+stan+".jpg");
    $.get(
        "ucitajStan.php", {
            id: stan
        },
        function(data) {
            if(data == "error") {
                window.location.href="error.php";
                return;
            }
            var obj = JSON.parse(data);
            troskovi = obj.troskovi;
            cena = obj.cena;
            $("#title").html(obj.naziv + " - Stan Na Dan");
            $("#naziv").html(obj.naziv);
            $("#opis").html(obj.opis);
            $("#opis").html(obj.opis);
            $("#lokacija").html("Ulica: " + obj.ulica + "<br/>Broj: " + obj.broj + "<br/>Tip: " + obj.tip + "<br/>Cena izdavanja: " + obj.cena + " din/dan" + "<br/>Troškovi održavanja: " + obj.troskovi + " din/dan");
            $("#slika").attr("src", "img/stanovi/"+obj.id+".jpg");
        }
    );
    $('#meseci').datepicker({
        format: "MM, yyyy",
        weekStart: 1,
        endDate: "today",
        minViewMode: 1,
        multidate: false,    
        autoclose: true,
        todayHighlight: true
    }).on('changeDate', function(e) {
        var date = $("#meseci").datepicker("getDate");
        var yyyy = date.getFullYear().toString();
        var mm = (date.getMonth()+1).toString();
        var count = 0;
        for (var i = 0; i < test.length; ++i) {
            var t = (test[i]+'').split("-");
            if(t[0] == yyyy && t[1] == pad(mm)) count++;
        }
        var dim = daysInMonth(mm,yyyy);
        var ukt = dim*troskovi;
        var ukp = count*cena;
        var profit = ukp-ukt;
        var rezultat = profit >= 0 ? "success" : "danger";
        $("#info").html(`<table class="table">
        <tbody>
          <tr>
            <td>Ukupni troškovi u toku meseca</td>
            <td>${ukt} din</td>
          </tr>
          <tr>
            <td>Ukupni prihod u toku meseca</td>
            <td>${ukp} din</td>
          </tr>
          <tr class="table-${rezultat}">
            <td>Ukupni profit u toku meseca</td>
            <td><strong>${profit} din</strong></td>
          </tr>
        </tbody>
      </table>`);
    });
    ucitajKalendar(stan);
}

function pad(d) {
    return (d < 10) ? '0' + d.toString() : d.toString();
}

function daysInMonth(month, year) {
    return new Date(year, month, 0).getDate();
}

function ucitajKalendar(stan) {
    $.get(
        "ucitajRezervacije.php", {
            stan: stan
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
            test=datumi;
            $('#calendar').datepicker({
                weekStart: 1,
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