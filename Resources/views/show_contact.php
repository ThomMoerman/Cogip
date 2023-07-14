<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/default.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/show_contact_invoice.css" rel="stylesheet" type="text/css">
    <title>Contact</title>
</head>

<body>
    <?php
        require '../Resources/Include/header.php'
    ?>
    <main>     
            <section id="page_profile">
                <div>
                    <h2 class="page__head"><?php echo $data['name'] ?></h2>
                    <div class="color__band"></div>
                </div>
            <img src="../assets/img/Avatar_One.svg" alt="avatar_pic">    
            <div class="page_info">
                <div class="info">               
                    <p class="info_title">Contact:  </p> <p class="info_element name"> <?php echo $data['name'] ?></p>
                </div> 
                <div class="info"> 
                    <p class="info_title">Phone: </p> <p class="info_element phone"><?php echo $data['phone'] ?></p>
                </div>
                <div class="info">    
                    <p class="info_title">Mail: </p> <p class="info_element mail"><?php echo $data['mail'] ?></p>
                </div>
                <div class="info">   
                    <p class="info_title">Company: </p> <p class="info_element company"><?php echo $data['company_name'] ?></p>
                </div>
        </section>
    </main>
    <?php
        require '../Resources/Include/footer.php'
    ?>
</body>

</html>