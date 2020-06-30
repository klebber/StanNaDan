function ucitajPodatkeOKorisnicima() {
    $.get(
        "obradaKorisnika.php", {
            operacija: 'ucitavanjeSvih'
        },
        function(data) {
            if(data == "error") {
                window.location.href="error.php";
                return;
            }
            if(data == '[]') {
                $("#grid").html(`<div class="alert alert-danger" role="alert">Ne postoje registrovani korisnici!</div>`);
                return;
            }
            var korisnici = JSON.parse(data);
            var tabela = `
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Ime</th>
                            <th scope="col">Prezime</th>
                            <th scope="col">Email</th>
                            <th scope="col">Izmena</th>
                            <th scope="col">Brisanje</th>
                        </tr>
                    </thead>
                    <tbody>
            `;
            for (var i = 0, len = korisnici.length; i < len; ++i) {
                var kor = korisnici[i];
                tabela += `
                        <tr>
                            <th scope="row">${i+1}</th>
                            <td>${kor[1]}</td>
                            <td>${kor[3]}</td>
                            <td>${kor[4]}</td>
                            <td>${kor[5]}</td>
                            <td><a class='btn btn-primary' href='izmenikorisnika.php?id=${kor[0]}'>Izmeni</a></td>
                            <td><button class='btn btn-primary' onclick='obrisiKorisnika(${kor[0]})'>Obriši</button></td>
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

function obrisiKorisnika(korisnik) {
    $.post(
        "obradaKorisnika.php", {
            operacija: 'brisanje',
            id: korisnik
        },
        function(data) {
            window.location = "korisnici.php";
            console.log(data);
        }
    );
}

function ucitajKorisnika(korisnik) {
    $.get(
        "obradaKorisnika.php", {
            operacija: 'ucitavanje',
            id: korisnik
        },
        function(data) {
            if(data == "error") {
                window.location.href="error.php";
                return;
            }
            if(data == '[]') {
                $("#grid").html(`<div class="alert alert-danger" role="alert">Ne postoje registrovani korisnici!</div>`);
                return;
            }
            var kor = JSON.parse(data);
            //title, header, polja

            $("#id").val(kor[0]);
            $("#username").val(kor[1]);
            $("#ime").val(kor[3]);
            $("#prezime").val(kor[4]);
            $("#email").val(kor[5]);

        }
    );
}