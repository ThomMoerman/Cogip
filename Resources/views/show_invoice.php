<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/default.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/show_contact_invoice.css" rel="stylesheet" type="text/css">
    <script src="assets/js/sub_nav_location.js" defer></script>
    <title>Invoice</title>
</head>

<body>
    <?php
        require '../Resources/Include/header.php'
    ?>
    <main>     
            <section id="page_profile">
            <h2 class="page__head"><?php echo $data['ref'] ?></h2>
            <div class="color__band_invoice"></div>
            <div class="page_info">
                <div class="info">               
                    <p class="info_title">Invoice N°:  </p> <p class="info_element ref"> <?php echo $data['ref'] ?></p>
                </div> 
                <div class="info"> 
                    <p class="info_title">Due date: </p> <p class="info_element due_date"><?php echo $data['due_date'] ?></p>
                </div>
                <div class="info">    
                    <p class="info_title">Company: </p> <p class="info_element mail"><?php echo $data['company_name'] ?></p>
                </div>
                <div class="info">   
                    <p class="info_title">Created at: </p> <p class="info_element company"><?php echo $data['created_at'] ?></p>
                </div>
                </div>
        </section>
    </main>
    <?php
        require '../Resources/Include/footer.php'
    ?>
</body>

</html>
