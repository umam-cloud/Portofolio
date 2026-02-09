<?php
session_start();
require "../config/database.php";

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET['id'];

$q = mysqli_query($conn, "SELECT * FROM projects WHERE id=$id");
$project = mysqli_fetch_assoc($q);

if (!$project) {
    die("Project tidak ditemukan");
}

if (isset($_POST['update'])) {

    $title = trim($_POST['title']);
    $desc  = trim($_POST['description']);
    $long  = trim($_POST['long_description']);
    $tech  = trim($_POST['tech_stack']);
    $link  = trim($_POST['demo_link']);

    if ($title == "" || $desc == "" || $long == "") {
        $error = "Field wajib tidak boleh kosong";
    } else {

        // Jika admin upload gambar baru
        if (!empty($_FILES['image']['name'])) {

            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            $allowed = ['jpg','jpeg','png','webp'];

            if (!in_array($ext, $allowed)) {
                $error = "Format gambar tidak valid";
            } else {

                // hapus gambar lama
                if ($project['image'] && file_exists("../uploads/" . $project['image'])) {
                    unlink("../uploads/" . $project['image']);
                }

                $imageName = time() . "_" . $_FILES['image']['name'];
                move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    "../uploads/" . $imageName
                );

                mysqli_query($conn,"
                    UPDATE projects SET
                        title='$title',
                        description='$desc',
                        long_description='$long',
                        tech_stack='$tech',
                        image='$imageName',
                        demo_link='$link'
                    WHERE id=$id
                ");

                header("Location: dashboard.php");
                exit;
            }

        } else {
            // Update TANPA ganti gambar
            mysqli_query($conn,"
                UPDATE projects SET
                    title='$title',
                    description='$desc',
                    long_description='$long',
                    tech_stack='$tech',
                    demo_link='$link'
                WHERE id=$id
            ");

            header("Location: dashboard.php");
            exit;
        }
    }
}
?>


<?php
include "partials/header.php";
include "partials/sidebar.php";
?>

<?php if (isset($error)): ?>
<p style="color:red"><?= $error ?></p>
<?php endif; ?>

<section class="form-page">
    <header class="form-header">
        <h1>Edit Project</h1>
        <p>Use clear and concise information for each project.</p>
    </header>

    <form class="editor-form" method="post" enctype="multipart/form-data">

        <!-- Judul -->
        <div class="field">
            <label>Project Title</label>
            <input type="text" name="title" value="<?= $project['title']; ?>" required>
        </div>

        <!-- Deskripsi singkat -->
        <div class="field">
            <label>Short Description</label>
            <textarea name="description" rows="3"required><?= $project['description']; ?></textarea>
            <small>Appears on the project list and homepage.</small>
        </div>

        <!-- Deskripsi panjang -->
        <div class="field">
            <label>Long Description</label>
            <textarea name="long_description" rows="6" required><?= $project['long_description']; ?></textarea>
            <small>Displayed on the project detail page.</small>
        </div>

        <!-- Tech stack -->
        <div class="field">
            <label>Tech Stack</label>
            <input type="text" name="tech_stack" value="<?= $project['tech_stack']; ?>">
        </div>

        <!-- Image -->
        <div class="field">
            <label>Project Image</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <!-- Link demo -->
        <div class="field">
            <label>Demo Link</label>
            <input type="url" name="demo_link" value="<?= $project['demo_link']; ?>">
        </div>

        <!-- Action -->
        <div class="form-action">
            <button type="submit" name="update">Save Project</button>
            <a href="dashboard.php">Cancel</a>
        </div>

    </form>
</section>

