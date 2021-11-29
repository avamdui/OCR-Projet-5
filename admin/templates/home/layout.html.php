<!DOCTYPE html>
<html>
    <head>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="/admin/assets/css/style.css" rel="stylesheet">
        <link href="/admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="/admin/assets/vendor/bootstrap-5.1.3-dist/css/bootstrap.css" rel="stylesheet">
        <link rel=icon href=/favicon.png sizes="16x16" type="image/png">
        <title>Mon Blog Pro</title>
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
        <script src="/admin/assets/vendor/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js" ></script>
    </body>
    
</html>
