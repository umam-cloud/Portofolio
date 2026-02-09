<?php
session_start();
require "../config/database.php";

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['save'])) {

    $title   = trim($_POST['title']);
    $desc    = trim($_POST['description']);
    $long    = trim($_POST['long_description']);
    $tech    = trim($_POST['tech_stack']);
    $link    = trim($_POST['demo_link']);

    if ($title == "" || $desc == "" || $long == "") {
        $error = "Field wajib belum lengkap";
    } else {

        $imageName = null;

        if ($_FILES['image']['name']) {
            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            $allowed = ['jpg','jpeg','png','webp'];

            if (!in_array($ext, $allowed)) {
                $error = "Format gambar tidak valid";
            } else {
                $imageName = time() . "_" . $_FILES['image']['name'];
                move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    "../uploads/" . $imageName
                );
            }
        }

        if (!isset($error)) {
            mysqli_query($conn,"
                INSERT INTO projects
                (title, description, long_description, tech_stack, image, demo_link)
                VALUES
                ('$title','$desc','$long','$tech','$imageName','$link')
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

<section class="form-page">
    <header class="form-header">
        <h1>Add Project</h1>
        <p>Use clear and concise information for each project.</p>
    </header>

    <form class="editor-form" method="post" enctype="multipart/form-data">

        <!-- Judul -->
        <div class="field">
            <label>Project Title</label>
            <input type="text" name="title" required>
        </div>

        <!-- Deskripsi singkat -->
        <div class="field">
            <label>Short Description</label>
            <textarea name="description" rows="3" required></textarea>
            <small>Appears on the project list and homepage.</small>
        </div>

        <!-- Deskripsi panjang -->
        <div class="field">
            <label>Long Description</label>
            <textarea name="long_description" rows="6" required></textarea>
            <small>Displayed on the project detail page.</small>
        </div>

        <!-- Tech stack -->
        <div class="field">
            <label>Tech Stack</label>
            <input type="text" name="tech_stack" placeholder="PHP, MySQL, JavaScript">
        </div>

        <!-- Image -->
        <div class="field">
            <label>Project Image</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <!-- Link demo -->
        <div class="field">
            <label>Demo Link</label>
            <input type="url" name="demo_link" placeholder="https://">
        </div>

        <!-- Action -->
        <div class="form-action">
            <button type="submit" name='save'>Save Project</button>
            <a href="dashboard.php">Cancel</a>
        </div>

    </form>
</section>
