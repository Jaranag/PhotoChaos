<!DOCTYPE html>
<?php include('inc/router.php'); ?>
<?php
$page = "";
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = "";
}
?>
<html lang="es">

<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
  <title>PhotoCaos</title>
</head>

<body class="font-['Montserrat']">
  <div class="container m-auto">
    <?php loadContent($page); ?>
  </div>
</body>

</html>