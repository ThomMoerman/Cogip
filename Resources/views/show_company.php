<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/reset.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/header.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/footer.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/show_contact.css" rel="stylesheet" type="text/css">
    <title>Invoice</title>
</head>

<body>
    <?php
        require '../Resources/Include/header.php'
    ?>
    <main>     
            <section id="page_profile">
            <h2 class="page__head"><?php echo $invoice['ref'] ?></h2>
            <div class="head__background"></div>
                <div class="info">               
                    <p class="info_title">Invoice N°:  </p> <p class="info_element ref"> <?php echo $invoice['ref'] ?></p>
                </div> 
                <div class="info"> 
                    <p class="info_title">Due date: </p> <p class="info_element due_date"><?php echo $invoice['due_date'] ?></p>
                </div>
                <div class="info">    
                    <p class="info_title">Company: </p> <p class="info_element mail"><?php echo $invoice['company_name'] ?></p>
                </div>
                <div class="info">   
                    <p class="info_title">Created at: </p> <p class="info_element company"><?php echo $invoice['created_at'] ?></p>
                </div>
        </section>
    </main>
    <?php
        require '../Resources/Include/footer.php'
    ?>
</body>

</html>
