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
</body>

</html>