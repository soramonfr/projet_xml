<?php
// Récupération et lecture des données XML 
$xml = simplexml_load_file("assets/source_xml/source.xml");
// Différentes pages du site - ok pour les essais mais à factoriser (car même structure: page - menu - titre et content)
$homepage = $xml->page[0]->content;
$about = $xml->page[1]->content;
$testimonies = $xml->page[2]->content;
$contact = $xml->page[3]->content;

if (empty($_GET)) {
    $displayContent = $homepage;
}

if (isset($_GET['id']) && ($_GET['id']) == 0) {
    $displayContent = $homepage;
}

if (isset($_GET['id']) && ($_GET['id']) == 1) {
    $displayContent = $about;
}

if (isset($_GET['id']) && ($_GET['id']) == 2) {
    $displayContent = $testimonies;
}

if (isset($_GET['id']) && ($_GET['id']) == 3) {
    $displayContent = $contact;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <title>TP XML</title>
</head>

<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-btn" aria-controls="navbar-btn" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-btn">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?id=0">Accueil</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?id=1">A propos</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?id=2">Témoignages</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?id=3">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>

    <div class="container-fluid">
        <div>
            <?= isset($displayContent) ? $displayContent : '' ?>
        </div>

    </div>


    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>