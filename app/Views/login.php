<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <form action="<?= base_url('processLogin') ?>" method="post">
        <div>
            <h1>Login Form</h1>
            <div style="display: flex;flex-direction: column;width:200px;gap:10px;">
                <input type="email" name="email" id="email" placeholder="Enter email">
                <input type="password" name="password" id="password" placeholder="Enter Password">
            </div>
            <br>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>

</html>