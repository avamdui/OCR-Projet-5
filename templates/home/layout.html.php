<!DOCTYPE html>
<html>
    <head>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="/assets/css/style.css" rel="stylesheet">
        <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>Mon Blog Pro - <?= $avm->pageTitle ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    </head>
    
    <body class="d-flex flex-column min-vh-100">
       
        <?php include "topbar.html.php" ?>
        <main>
        <div class="container">

            <?= $pageContent ?>           
        </div>
        </main>
        <?php include "footer.html.php" ?>
        <!--Import jQuery before materialize.js-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
    
</html>