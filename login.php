<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="style.css">
    <title>Grid Image</title>
</head>

<body>
    <header>Login</header>

    <main>
        <div class="container">

            <form method="post" action="includes/login.inc.php">
                <input type="text" name="username" placeholder="Username" required class="form-control">
                <input type="password" name="password" placeholder="Password" required class="form-control">

                <button type="submit" class="btn btn-primary submit">Login</button>
            </form>

        </div>
    </main>

</body>

</html>