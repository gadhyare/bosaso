<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="robots" content="noindex">
  <title><?= $op->siteSetting("siteName") . " | " . $op->siteSetting("siteDisc"); ?></title>
  <meta name="description" content="<?php echo $op->siteSetting("siteName"); ?>" />
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo $op->siteSetting("siteUrl"); ?>assets/img/fav.ico">
  <link rel="canonical" href="<?php echo $op->siteSetting("siteUrl"); ?>" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="title" content="<?php echo $op->siteSetting("siteName"); ?>" />
  <meta property="og:url" content="<?php echo $op->siteSetting("siteUrl"); ?>" />
  <meta property="og:title" content="<?php echo $op->siteSetting("siteName"); ?>" />

  <meta name="og:description" content="<?= $op->siteSetting("siteName") . "|" . $op->siteSetting("siteDisc"); ?>" />
  <meta property="og:type" content="article" />

  <meta name="twitter:url" content="<?php echo $op->siteSetting("siteUrl"); ?>" />
  <meta name="twitter:title" content="<?php echo $op->siteSetting("siteName"); ?>" />
  <meta name="twitter:description" content="<?php echo $op->siteSetting("siteName"); ?>" />
  <meta name="twitter:image:src" content="<?php echo $op->siteSetting("siteUrl"); ?>" />
  <meta name="twitter:image:alt" content="<?php echo $op->siteSetting("siteName"); ?>" />
  <meta name="membershipDomain" content="<?php echo $op->siteSetting("siteUrl"); ?>" />


  <link rel="stylesheet" href="<?php echo $op->siteSetting("siteUrl"); ?>assets/css/font-awesome.min.css">

  <link rel="stylesheet" href="<?php echo $op->siteSetting("siteUrl"); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $op->siteSetting("siteUrl"); ?>assets/css/mdb.min.css">
  <link rel="stylesheet" media="print" href="<?php echo $op->siteSetting("siteUrl"); ?>assets/css/mdb.min.css">
  <link rel="stylesheet" href="<?php echo $op->siteSetting("siteUrl"); ?>assets/css/mdb.lite.min.css">
  <link rel="stylesheet" href="<?php echo $op->siteSetting("siteUrl"); ?>assets/css/print.css">
  <!-- DataTables CSS -->
  <link href="<?php echo ROOT_URL; ?>/assets/css/addons/datatables.min.css" rel="stylesheet">
  <!-- DataTables JS -->

  <!-- DataTables Select CSS -->
  <link href="<?php echo ROOT_URL; ?>/assets/css/addons/datatables-select.min.css" rel="stylesheet">
  <!-- DataTables Select JS -->

  <link rel="stylesheet" href="<?php echo $op->siteSetting("siteUrl"); ?>assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $op->siteSetting("siteUrl"); ?>assets/css/dataTables.jqueryui.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $op->siteSetting("siteUrl"); ?>assets/css/datatables.min.css" />

  <script type="text/javascript" src="<?php echo $op->siteSetting("siteUrl"); ?>assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo $op->siteSetting("siteUrl"); ?>assets/js/dataTables.jqueryui.min.js"></script>

  <script src="<?php echo $op->siteSetting("siteUrl"); ?>assets/js/jquery.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

  <link href="<?php echo $op->siteSetting("siteUrl"); ?>assets/css/select2.min.css" rel="stylesheet" />
  <script src="<?php echo $op->siteSetting("siteUrl"); ?>assets/js/select2.min.js"></script>
</head>

<?php if (!isset($_SESSION["loged_in"])) {
  echo '<body class="body" style="height: 100vh;"><div class="container-fluid bg-dark home">';
  if ($_GET['controller'] != 'user') {
    header("Location: " . ROOT_URL . '/user/login');
  }
} else {
  echo '<body > <div class="container-fluid bg-white m-0   p-0">';
}
?>

<div class="container-fluid p-0" >
  <div class="container-fluid py-2  text-left " style="background-color: <?php echo $op->getThemeColor(); ?> !important; ">
    <div class="row">
      <div class="col-sm-6 col-md-9 p-0 text-left ">
        <form action="<?php echo ROOT_URL; ?>/home" method="post" class=" px-2">
          <ul class="themeColor  ">
            <input type="submit" name="red" id="" style="background-color: #e40017;border-radius: 50px;" value="">
            <input type="submit" name="brown" id="" style="background-color: #85586F;border-radius: 50px;" value="">
            <input type="submit" name="green" id="" style="background-color: #506464;border-radius: 50px;" value="">
            <input type="submit" name="bluegray" id="" style="background-color:  #344352;border-radius: 50px;" value="">
            <input type="submit" name="orange" id="" style="background-color:  #ff7b54;border-radius: 50px;" value="">
            <input type="submit" name="pink" id="" style="background-color:  #cc0e74;border-radius: 50px;" value="">
            <input type="submit" name="purple" id="" style="background-color:  #544667;border-radius: 50px;" value=""> 
          </ul>
        </form>
      </div>
      <div class="col-sm-6 col-md-3 p-0">
        <a href="<?php echo ROOT_URL; ?>/usrprofile/<?php echo $_SESSION['log_id']; ?>" class="nav-item text-white "> <?php echo $_SESSION['log_user']; ?></a> <span class="px-2">|</span>
        <a href="<?php echo ROOT_URL; ?>/usrprofile/logout" class="nav-item text-white   mr-5"> <?=$op->lang("logout");?> </a>
      </div>
    </div>
  </div>
  <div class="span text-white text-center " style="margin: 0 auto; "><?php echo $op->breadcrumb(); ?></div>