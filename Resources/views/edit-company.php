<!DOCTYPE html>
<html>

<head>
    <title>Formulaire POST</title>
</head>

<body>
    <form action="/edit-company/<?php echo $_GET['id'] ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required value="<?php echo $_GET['name'] ?>"><br><br>

        <label for='type_id'>Type:</label>
        <input type="number" id="type_id" name="type_id" required value="<?php echo $_GET['type_id'] ?>">
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