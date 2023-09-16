<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection("titulo");?></title>
    <link rel="stylesheet" href="<?=base_url()?>public/bootstrap/dist/css/bootstrap.min.css">
</head>
   
<body>
    <?= $this->renderSection("main");?>
    <script src="<?=base_url()?>/public/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>