function ucitajRezervacije() {
    $.get(
        "ucitajRezervacije.php", {
        },
        function(data) {
            if(data == "error") {
                window.location.href="error.php";
                return;
            }
            if(data == '[]') {
                $("#tabela").html(`<div class="alert alert-danger" role="alert">Ne postoje rezervacije za vaš nalog.</div>`);
                return;
            }
            var rezervacije = JSON.parse(data);
            var tabela = `
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Stan</th>
                            <th scope="col">Datum</th>
                            <th scope="col">Cena</th>
                            <th scope="col">Poništavanje</th>
                        </tr>
                    </thead>
                    <tbody>
            `;
            for (var i = 0, len = rezervacije.length; i < len; ++i) {
                var rez = rezervacije[i];
                tabela += `
                        <tr>
                            <th scope="row">${i+1}</th>
                            <td>${rez[4]}</td>
                            <td>${rez[3]}</td>
                            <td>${rez[5]} €</td>
                            <td><button class='btn btn-primary' onclick='ponistiRezervaciju(${rez[0]})'>Poništi</button></td>
                        </tr>
                `;
            }
            tabela += `
                    </tbody>
                </table>
            `;
            $("#tabela").html(tabela);
        }
    );
}

function ponistiRezervaciju(rezId) {
    $.post(
        "obradiRezervaciju.php", {
            operacija: "brisanje",
            id: rezId
        },
        function(data) {
            if(data == "error") {
                alert('Došlo je do greške prilikom rezervacije.');
            } else if(data == "success") {
                window.location = "rezervacije.php";
            }
        }
    );
}