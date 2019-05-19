<?php
//Se non è loggato (o è scaduto) lo riportiamo alla pagina di login.
session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['tipoutente'])) {
	header("Location: /RegistroElettronicoPHP/index.php?login=expired");
	exit();
}

$pathfunctions = $_SERVER['DOCUMENT_ROOT'].'/RegistroElettronicoPHP/functions/';

require($pathfunctions.'func.php');
require($pathfunctions.'snippets.php');

$db = Connect();
$id = $_SESSION['id'];
$tipoutente = $_SESSION['tipoutente'];
$nomepagina = "voti";

if ($tipoutente != 3) //Se non è uno studente riportalo all'homepage
{
  //volendo si può inviare un 403 forbidden....
  header("Location: /RegistroElettronicoPHP/homepage.php");
  exit();
}

?>

<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FAKElog homepage</title>
    <meta name="description" content="FAKElog Registro Elettronico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.css" crossorigin="anonymous">
    <?php StampaAccentCSS($tipoutente); ?>
    <link rel="stylesheet" href="/RegistroElettronicoPHP/styles/extras.1.1.0.min.css">
    <link rel="stylesheet" href="/RegistroElettronicoPHP/styles/commonstyle.css">
  </head>
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-navbar flex-md-nowrap p-0">
              <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <span class="d-none d-md-inline ml-1 text-white">Registro Elettronico</span>
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons text-white">&#xE5C4;</i>
              </a>
            </nav>
          </div>
          <div class="w-100 d-md-flex d-lg-flex"></div>
          <div class="nav-wrapper">
            <ul class="nav flex-column">
              <?php StampaNavItems($tipoutente, $nomepagina); ?>
            </ul>
          </div>
        </aside>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-navbar-light">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <div class="w-100 d-md-flex d-lg-flex"></div>
              <ul class="navbar-nav flex-row ">
                <li class="nav-item dropdown notifications">
                  <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="nav-link-icon__wrapper">
                      <i class="material-icons text-white">&#xE7F4;</i>
                      <span class="badge badge-pill badge-warning">4</span>
                    </div>
                  </a>
                  <?php StampaNotificheEsempio(); ?>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-4" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="<?php GetPercorsoFoto($db, $id); ?>" alt="User Avatar">
                    <span class="d-none d-md-inline-block text-white">
                    <?php
                      list($nome, $cognome) = GetNomeCognome($db, $id);
                      if ($nome != null && $cognome != null)
                      {
                        if ($tipoutente == 2) //Genitore - TODO, FIX
                          echo "Genitore per ";
                        echo "$cognome $nome";
                      }
                    ?>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-big">
                    <a class="dropdown-item" href="/RegistroElettronicoPHP/profile.php">
                      <i class="material-icons">&#xE7FD;</i>  Profilo</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="/RegistroElettronicoPHP/logout.php">
                      <i class="material-icons text-danger">&#xE879;</i>  Esci </a>
                  </div>
                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons text-white">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Dashboard</span>
                <h3 class="page-title">Orario Lezioni</h3>
              </div>
            </div>
            <div class="container" data-masonry='{ "itemSelector": ".card" }'>
            </div>
            <!-- End Page Header -->
          </div>
          <footer class="main-footer footer d-flex p-2 px-3 bg-white">
			<?php StampaFooter(); ?>
          </footer>
        </main>
      </div>
    </div>
    <script src="https://unpkg.com/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="/RegistroElettronicoPHP/scripts/extras.1.1.0.min.js"></script>
    <script src="/RegistroElettronicoPHP/scripts/shards-dashboards.1.1.0.min.js"></script>
  </body>
</html>