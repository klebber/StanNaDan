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
    if(findGetParameter('ulid') != null) {
        $.get(
            "ucitajUlicu.php", {
                ulid: findGetParameter('ulid')
            },
            function(data) {
                $("#searchquery").val(data);
            }
        );
    }
    $.get(
        "ucitajStanove.php", {
            ulid: findGetParameter('ulid'),
            tip: findGetParameter('tip')
        },
        function(data) {
            $("#grid").html(data);
        }
    );
}