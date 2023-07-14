<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/reset.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard_nav.css" rel="stylesheet" type="text/css">
    <script type="module" rel='javascript' src="assets/js/contact_form.js"></script>
    <title>New Contact</title>
</head>
<body>
<h1>New Contact</h1>

<form action="/contacts_add" method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required><br>

    <label for="company_id">Company:</label>
    <input type="text" name="company_id" id="company_id" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br>

    <label for="phone">Phone:</label>
    <input type="text" name="phone" id="phone" required><br>

    <button type="submit">Create</button>
</form>

</body>
</html>