function findGetParameter(parameterName) {
    var url = new URL(document.location.href);
    var search_params = url.searchParams;
    return search_params.get(parameterName);
}

function insertParam(key, value) {
    var url = new URL(document.location.href);
    var search_params = url.searchParams;
    search_params.set(key, value);
    window.history.pushState('',document.title,url);
    window.location.reload();
}

function removeParam(parameter)
{
    var url = new URL(document.location.href);
    var search_params = url.searchParams;
    search_params.delete(parameter);
    window.history.pushState('',document.title,url);
    window.location.reload();
}

function getSuggestions() {
    var q = $("#searchquery").val().trim();
    if(q == "") { 
        $("#suggest").hide();
        $("#search").css("box-shadow", "none");
        return; 
    }
    $.get(
        "suggest.php", {
            query: q
        },
        function(data) {
            $("#suggest").show();
            $("#search").css("box-shadow", "0 4px 6px 0 rgba(32,33,36,0.28)");
            $("#suggest").html(data);

        }
    );
}

function ucitajStanove() {
    $.get(
        "ucitajStanove.php", {
            ulid: findGetParameter('ulid'),
            tip: findGetParameter('tip')
        },
        function(data) {
            if(data == "error") {
                window.location.href="error.php";
                return;
            }
            if(data == '[]') {
                $("#grid").html(`<div class="alert alert-danger" role="alert">Ne postoje stanovi koji ispunjavaju kriterijume!</div>`);
                return;
            }
            var stanovi = JSON.parse(data);
            console.log(stanovi);
            if(findGetParameter('ulid') != null) {
                $("#searchquery").val((stanovi[0])[3]);
            }
            var grid = `
                <div class="card-deck">
            `;
            for (var i = 0, len = stanovi.length; i < len; ++i) {
                var stan = stanovi[i];
                grid += `
                    <div class="col-lg-6 col-sm-12 portfolio-item">
                        <div class="card">
                            <a href="stan.php?id=${stan[0]}"><img class="card-img-top stanovi-card-img" src="img/stanovi/${stan[0]}.jpg" alt=""></a>
                            <div class="card-body">
                                <a href="stan.php?id=${stan[0]}"><h5 class="card-title">${stan[1]}</h5></a>
                                <p class="card-text">${stan[2]}</p>
                                <p class="card-text"><small class="text-muted">Tip stana: ${stan[5]}</small></p>
                            </div>
                        </div>
                    </div>
                `;
            }
            grid += `
                </div>
            `;
            $("#grid").html(grid);
        }
    );
}