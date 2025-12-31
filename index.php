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

    <title>Image Grid Converter</title>
</head>

<body>

    <header>Image Grid</header>

    <main>
        <div class="container">


            <?php session_start(); ?>
            <?php if (isset($_SESSION['user_id'])): ?>
            <div class="welcome-container">

                Hello <?= htmlspecialchars($_SESSION['user_name']) ?>!

                <form method="post" action="includes/logout.inc.php">
                    <button type="text" class="btn btn-outline-primary submit" id="logout">Logout</button>
                </form>

            </div>

            <?php else: ?>


            <div class="login-container">
                <button type="text" class="btn btn-primary" id="login-page">Login</button>
                or
                <button type="text" class="btn btn-outline-primary" id="register-page">Register</button>
            </div>


            <?php endif; ?>

            <?php if (isset($_SESSION['user_id'])): ?>
            <form method="post" action="grid_image.php" enctype="multipart/form-data">

                <input type="file" name="file" id="file" required class="form-control">


                <div class="form_check">
                    Line Color:
                    <input type="radio" checked id="black" name="line_color" value="black" class="form-check-input">
                    <label for="black" class="form-check-label">Black</label>
                    <input type="radio" id="white" name="line_color" value="white" class="form-check-input">
                    <label for="white" class="form-check-label">White</label>
                </div>

                <div>

                    <label for="grid_count" class="form-label">Grid Count:
                        <output for="grid_count" id="rangeValue" aria-hidden="true"></output>
                    </label>

                    <input type="range" class="form-range" id="grid_count" value="5" name="grid_count" min="2" max="30"
                        required>

                </div>

                <button type="submit" class="btn btn-primary submit">Submit</button>

            </form>


            <?php 
            
            $images;
                try {
                    require_once "./includes/dbh.inc.php";

                    $query = "SELECT * FROM images WHERE user_id = ?";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute([$_SESSION['user_id']]);

                    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);;

                
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

            ?>

            <?php if (count($images) > 0): ?>
            <h3>Your images</h3>
            <?php endif; ?>

            <div class="thumbnails-container">
                <?php foreach ($images as $image): ?>
                <div class="image-thumbnail-container">
                    <img
                        src="<?php echo 'http://localhost/ImageGrid/images/' . $image['user_id'] . '/' . $image['id'] . '.jpg'; ?>">

                    <button type="button" id="<?php echo $image['user_id'] . '/' . $image['id'] ?>"
                        class="btn btn-outline-primary download-button">Download</button>

                </div>
                <?php endforeach; ?>
            </div>

            <?php endif; ?>
        </div>

    </main>

    <script>
    document.getElementById('login-page')?.addEventListener("click", () =>
        window.location.href = "./login.php"
    );

    document.getElementById('register-page')?.addEventListener("click", () =>
        window.location.href = "./register.php"
    );

    const rangeInput = document.getElementById('grid_count');
    const rangeOutput = document.getElementById('rangeValue');

    rangeOutput.textContent = rangeInput.value;

    rangeInput.addEventListener('input', function() {
        rangeOutput.textContent = this.value;
    });

    const buttons = Array.from(document.getElementsByClassName("download-button"));

    buttons.forEach(button => {
        button.addEventListener("click", (event) => {
            const link = document.createElement("a");
            link.href = "http://localhost/ImageGrid/images/" + event.target.id + ".jpg";
            link.download = event.target.id;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    })
    </script>

</body>

</html>