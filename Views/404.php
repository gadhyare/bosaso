<!DOCTYPE html>
<html lang="en">
<?php $op = new Khas; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $op->lang("error page"); ?></title>
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-naskh" type="text/css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>

<body>
    <div class="container mt-5 text-center rounded-0">
        <div class="card col-7 p-0 rounded-0 m-auto">
            <div class="card-header bg-danger text-white rounded-0 p-1 pt-2">
                <h3> <?= $op->lang("error page"); ?> </h3>
            </div>
            <div class="card-body p-2 rounded-0 text-center">
                <p class="d-3 rounded-0 text-center mb-3">
                    <?= $op->lang("we apologize for the lack of the requested page"); ?>
                </p>
                <span class="display-6 text-center "> <a href="<?php echo ROOT_URL; ?>/home"> <?= $op->lang("home"); ?> </a> </span>
            </div>
        </div>
    </div>
</body>

</html>