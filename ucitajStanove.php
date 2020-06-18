<?php 

include 'init.php';
include 'dbConnection.php';

$ulid = $_GET['ulid'];
$tip = $_GET['tip'];

$where = "";

if($ulid != "") {
    $where = "WHERE ulica = '$ulid' ";
    if($tip != "") {
        $where .= "AND ";
    }
}
if($tip != "") {
    if($where == "") {
        $where = "WHERE ";
    }
    $where .= "tip = '$tip' ";
}
$upit = "SELECT id, naziv, opis, ulica, broj, tip FROM stan $where ORDER BY naziv";
$rezultat = $mysqli->query($upit);
if ($rezultat->num_rows == 0) {
    echo "<p>U bazi ne postoje stanovi koji ispunjavaju kriterijume!</p>";
    return;
}
?>
<div class="card-deck"><?php
    while ($red = $rezultat->fetch_object()) { ?>
        <div class="col-lg-6 col-sm-12 portfolio-item">
            <div class="card">
                <a href="stan.php?id=<?=$red->id?>"><img class="card-img-top stanovi-card-img" src="img/stanovi/<?=$red->id?>.jpg" alt=""></a>
                <div class="card-body">
                    <a href="stan.php?id=<?=$red->id?>"><h5 class="card-title"><?=$red->naziv?></h5></a>
                    <p class="card-text"><?=$red->opis?></p>
                    <p class="card-text"><small class="text-muted">Tip stana: <?=$red->tip?></small></p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>