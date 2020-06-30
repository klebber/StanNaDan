function ucitajIzdavanja() {
    $.get(
        "ucitajStanove.php", {
            vlasnik: true
        },
        function(data) {
            if(data == "error") {
                window.location.href="error.php";
                return;
            }
            if(data == '[]') {
                $("#tabela").html(`<div class="alert alert-danger" role="alert">Ne postoje izdavanja stanova za vaš nalog.</div>`);
                return;
            }
            var izdavanja = JSON.parse(data);
            var tabela = `
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Naziv</th>
                            <th scope="col">Ulica</th>
                            <th scope="col">Broj</th>
                            <th scope="col">Tip</th>
                            <th scope="col">Cena</th>
                            <th scope="col">Detalji</th>
                            <th scope="col">Brisanje</th>
                        </tr>
                    </thead>
                    <tbody>
            `;
            for (var i = 0, len = izdavanja.length; i < len; ++i) {
                var iz = izdavanja[i];
                tabela += `
                        <tr>
                            <th scope="row">${i+1}</th>
                            <td>${iz[1]}</td>
                            <td>${iz[3]}</td>
                            <td>${iz[4]}</td>
                            <td>${iz[5]}</td>
                            <td>${iz[6]} din</td>
                            <td><a class='btn btn-primary' href='detalji.php?id=${iz[0]}'>Detalji</a></td>
                            <td><button class='btn btn-primary' onclick='obrisiStan(${iz[0]})'>Obriši</button></td>
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

function obrisiStan(stanId) {
    $.post(
        "obrisiStan.php", {
            id: stanId
        },
        function(data) {
            if(data == "error") {
                alert('Došlo je do greške prilikom rezervacije.');
            } else if(data == "success") {
                window.location = "izdavanje.php";
            }
        }
    );
}