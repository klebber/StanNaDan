<?php
if (!isset($_GET['query'])) {
    echo "Parametar unos nije prosleđen!";
} else {
    include 'init.php';
    include 'dbConnection.php';
    $pomocna = $mysqli->real_escape_string(trim($_GET["query"]));
    
    $upit = "SELECT id, naziv FROM adresa WHERE LOWER(naziv) LIKE LOWER('$pomocna%') ORDER BY naziv";

    $rezultat = $mysqli->query($upit);

    if ($rezultat->num_rows == 0) {
        echo "<p style='padding-left: 20px;'>U bazi ne postoji adresa čiji naziv počinje sa " . $pomocna . "</p>";
    } else {
        ?><ul class="suggest-list"><?php
        while ($red = $rezultat->fetch_object()) { ?>
            <li class="suggest-item" onclick="insertParam('ulid',<?php echo $red->id; ?>);"><?php echo $red->naziv; ?></li>
        <?php }
        ?></ul><?php
    }
    $mysqli->close();
}
?>