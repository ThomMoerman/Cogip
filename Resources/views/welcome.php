
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cogip - Welcome</title>
    <link rel="stylesheet" type="text/css" href="../../public/assets/css/reset.css">
    <link rel="stylesheet" type="text/css" href="../../public/assets/css/header.css">
</head>
<body>
       <section class="container">
        <img 
                src="public/assets/img/Illustration.png" 
                alt="cogip logo"
                class="illustration">
            <h1>Welcome to <?php echo $name ?></h1>
            <p>This base project is provided by BeCode</p>
            <ul>
                <li><a href="https://github.com/bramus/router" target="_blank">Bramus/Router</a></li>
                <li><a href="https://github.com/filp/whoops" target="_blank">Flip/Whoops</a></li>
                <li>dd() function</li>
                <li>redirect() function</li>
            </ul>
       </section>
    </main> 
    <?php
    require '../Resources/Include/footer.php'; 
    ?>
</body>
</html>
