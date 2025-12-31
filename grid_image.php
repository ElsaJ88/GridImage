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

    <?php 
    include 'functions.php';

    $gridCount = $_POST["grid_count"];

    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $content = file_get_contents($_FILES['file']['tmp_name']);
    }
    else 
    {
        echo "No file uploaded or upload error.";
    }

    $imagePath = $_FILES['file']['tmp_name'];
    $lineColor = $_POST['line_color'] ?? 'black';

    $linePixels = 10;
    
    session_start();
    $userId = $_SESSION['user_id'];
    
    try {
        require_once "./includes/dbh.inc.php";

        $query = "INSERT INTO images (name, user_id, created_at ) VALUES (?,?,?)";

        $stmt = $pdo->prepare($query);
        $stmt->execute(['image1', $userId, date('Y-m-d H:i:s')]);

            
        $imageId = $pdo->lastInsertId();
        
        $pdo = null;
        $smtm = null;

        
    $imageConverting = convertImage($imagePath, $gridCount, $linePixels, $lineColor, $userId, $imageId);


    } catch (PDOException $e) {
        echo $e->getMessage();
    }



    ?>
    <header>Image Grid</header>

    <main>
        <div class="container image_container">
            <button id="back" class="btn btn-primary">Back</button>

            <img class="grid_image"
                src="<?php echo 'http://localhost/ImageGrid/images/' . $userId . '/' . $imageId . '.jpg'; ?>"
                alt="image with grid">
            <button type="button" id="download_button" class="btn btn-primary">Download Image</button>

    </main>

    <script>
    document.getElementById("back").addEventListener("click", () => {

        window.location.href = 'index.php';

    })

    document.getElementById("download_button")?.addEventListener("click", () => {
        const link = document.createElement("a");
        link.href = "http://localhost/ImageGrid/images/with_grid.jpg";
        link.download = "with_grid.jpg";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });
    </script>

</body>

</html>