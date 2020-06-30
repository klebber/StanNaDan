var temp;
var hum;
var co2;
var light;

function ucitajPodatkeOStanovima() {
    $("#stan").html("<option selected disabled>Izaberite stan</option>");
    ucitajStanove();
}

function ucitajStanove() {
    temp = getRandomData(18,27);
    hum = getRandomData(25,65);
    co2 = getRandomData(200,450);
    light = getRandomData(1,5);
    $.get(
        "ucitajStanove.php", {
        },
        function(data) {
            if(data == "error") {
                window.location.href="error.php";
                return;
            }
            if(data == '[]') {
                $("#selection").html(`<div class="alert alert-danger" role="alert">Ne postoje stanovi u bazi!</div>`);
                return;
            }
            var stanovi = JSON.parse(data);
            for (var i = 0, len = stanovi.length; i < len; ++i) {
                var stan = stanovi[i];
                $("#stan").append('<option value="' + stan[0] + '">' + stan[1] + '</option>');
            }
        }
    );
}

function selectionChanged(){
    $("#info").html('');
    new Chart(document.getElementById('temp').getContext('2d'), {
        type: 'line', data: { labels: getDates(), datasets: [{ label: 'Temperatura', borderColor: 'rgb(57, 210, 227)', fill: false, data: temp }] }, options: {}
    });
    new Chart(document.getElementById('hum').getContext('2d'), {
        type: 'line', data: { labels: getDates(), datasets: [{ label: 'Vlažnost vazduha', borderColor: 'rgb(36, 138, 51)', fill: false, data: hum }] }, options: {}
    });
    new Chart(document.getElementById('co2').getContext('2d'), {
        type: 'line', data: { labels: getDates(), datasets: [{ label: 'Ugljen dioksid', borderColor: 'rgb(176, 37, 37)', fill: false, data: co2 }] }, options: {}
    });
    new Chart(document.getElementById('light').getContext('2d'), {
        type: 'line', data: { labels: getDates(), datasets: [{ label: 'Nivo osvetljenja', borderColor: 'rgb(219, 211, 55)', fill: false, data: light }] }, options: {}
    });
}

function getRandomData(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    var array = [];
    for (var i = 0; i < 30; i++) {
        array.push(Math.floor(Math.random() * (max - min + 1)) + min);
    }
    console.log(array);
    return array;
}

function getDates() {
    end = new Date();
    start = new Date(new Date().setDate(new Date().getDate() - 29));
    for(var arr=[],dt=new Date(start); dt<=end; dt.setDate(dt.getDate()+1)){
        var d = new Date(dt);
        var dd = d.getDate();
        var mm = (d.getMonth() + 1);
        arr.push((dd < 10 ? '0'+dd : dd ) + "." + (mm < 10 ? '0'+mm : mm ) + "." + d.getFullYear());
    }
    return arr;
}