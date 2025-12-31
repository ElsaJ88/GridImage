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
    <header>Register</header>

    <main>
        <div class="container">

            <form method="post" action="includes/register.inc.php">
                <input type="text" name="username" placeholder="Username" required class="form-control">
                <input type="email" name="email" placeholder="Email" required class="form-control">
                <input type="password" name="password" placeholder="Password" required class="form-control">
                <input type="password" name="password-confirmation" placeholder="Confirm password" required
                    class="form-control">

                <button type="submit" class="btn btn-primary submit">Register</button>
            </form>

        </div>
    </main>

</body>

</html>