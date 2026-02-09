<?php
session_start();
require "../config/database.php";
include "partials/header.php";
include "partials/sidebar.php";
?>

<header class="page-header">
    <h1>PROJECTS</h1>
    <a href="project-add.php" class="add-btn">Add Project</a>
</header>

<section class="project-list">
<?php
$q = mysqli_query($conn, "SELECT * FROM projects ORDER BY id DESC");
while ($p = mysqli_fetch_assoc($q)):
?>
    <div class="project-item">
        <div>
            <strong><?= $p['title']; ?></strong><br>
            <span><?= $p['tech_stack']; ?></span>
        </div>

        <div class="actions">
            <a href="project-edit.php?id=<?= $p['id']; ?>">Edit</a>
            <a href="project-delete.php?id=<?= $p['id']; ?>"
               onclick="return confirm('Hapus project?')">Delete</a>
        </div>
    </div>
<?php endwhile; ?>
</section>

<?php include "partials/footer.php"; ?>
