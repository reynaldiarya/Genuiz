<?php
// Proses upload file jika formulir dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDir = 'pdf/';
    $originalFileName = $_FILES['file']['name'];
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);

    // Membuat nama file unik dengan menambahkan timestamp
    $uniqueFileName = time() . '_' . uniqid() . '.' . $fileExtension;

    $uploadFile = $uploadDir . $uniqueFileName;
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {

        $redirectUrl = 'hasil.php?text=' . urlencode($uniqueFileName) . '&questions=' . urlencode($_POST['question']);
        header("Location: $redirectUrl");
    }
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Genuiz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-dark text-white">
    <div class="text-center mt-5 mb-0">
        <h1>Genuiz</h1>
    </div>
    <div class="container d-flex justify-content-center bg-blue">
        <div class="col-lg-4 my-5">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="file">Pilih File (PDF):</label>
                    <input class="form-control" type="file" id="file" name="file" accept=".pdf" required>
                </div>
                <div class="form-group mt-2">
                    <label for="exampleFormControlSelect1">Maksimal Pertanyaan</label>
                    <input class="form-control" type="number" min="1" value="1" name="question" required>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Buat Pertanyaan</button>
            </form>
        </div>
    </div>
    <footer class="py-3">
        <p class="border-top pt-4 text-center mt-5 mb-2">&copy; 2024 D4 Teknik Informatika Universitas Airlangga</p>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>