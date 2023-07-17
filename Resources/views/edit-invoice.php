<!DOCTYPE html>
<html>

<head>
    <title>Formulaire POST</title>
</head>

<body>
    <form action="/edit-invoice/<?php echo $_GET['id'] ?>" method="POST">
        <label for="ref">ref:</label>
        <input type="text" id="ref" name="ref" required value="<?php echo $_GET['ref'] ?>"><br><br>

        <label for='id_company'>id company:</label>
        <input type="number" id="id_company" name="id_company" required value="<?php echo $_GET['id_company'] ?>">
        <input type="submit" name="send" value="send">
    </form>
    <?php if (isset($errors) && !empty($errors)): ?>
    <div class="error-messages">
        <?php foreach ($errors as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</body>

</html>