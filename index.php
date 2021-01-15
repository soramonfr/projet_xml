<?php
// Routing - appel page accueil.html à l'état initial
if (!isset($_GET['id'])) {
    header('Location: /accueil.html');
}
// Récupération et lecture des données XML 
$xml = simplexml_load_file("assets/source_xml/source.xml");
// Affichage des différentes pages du site
$homepage = $xml->page[0]->content;
$about = $xml->page[1]->content;
$testimonies = $xml->page[2]->content;
$contact = $xml->page[3]->content;

if (empty($_GET)) {
    $displayContent = $homepage;
}

if (isset($_GET['id']) && (intval($_GET['id'])) == 0) {
    $displayContent = $homepage;
}

if (isset($_GET['id']) && (intval($_GET['id'])) == 1) {
    $displayContent = $about;
}

if (isset($_GET['id']) && (intval($_GET['id'])) == 2) {
    $displayContent = $testimonies;
}

if (isset($_GET['id']) && (intval($_GET['id'])) == 3) {
    $displayContent = $contact;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="../projet_xml/assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- Génération du titre en fonction de son index -->
    <title><?= $xml->page[intval($_GET["id"])]->title ?></title>
</head>

<body>
    <!-- Génération Navbar & Menu burger -->
    <nav class="navbar navbar-expand-lg navbar-dark navbarColor">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-btn" aria-controls="navbar-btn" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbar-btn">
            <ul class="navbar-nav text-center">
                <li>
                    <a class="nav-link text-white my-auto h4 mx-2" href="/accueil.html">Accueil</a>
                </li>
                <li>
                    <a class="nav-link text-white my-auto h4 mx-2" href="/qui-sommes-nous.html">Qui sommes nous?</a>
                </li>
                <li>
                    <a class="nav-link text-white my-auto h4 mx-2" href="/nos-clients-temoignent.html">Nos clients témoignent</a>
                </li>
                <li>
                    <a class="nav-link text-white my-auto h4 mx-2" href="/contact.html">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid p-0">
        <!-- Génération du fil d'Ariane -->
        <?php if (isset($_GET['id']) && (intval($_GET['id'])) > 0) : ?>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/accueil.html">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $xml->page[intval($_GET["id"])]->menu ?></li>
                </ol>
            </nav>
        <?php endif ?>
        <!-- Génération du contenu -->
        <?= isset($displayContent) ? $displayContent : '' ?>
    </div>


    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>