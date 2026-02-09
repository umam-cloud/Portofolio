<?php
$page = "detail";

require "config/profile.php";
require "config/database.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM projects WHERE id = $id");
$project = mysqli_fetch_assoc($query);

if (!$project) {
    echo "Project tidak ditemukan";
    exit;
}
?>

<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>


<section class="project-detail">
    <a href="index.php#projects" class="back-link">← Back to Projects</a>

    <h1><?= $project['title']; ?></h1>

    <p class="tech-stack">
        <strong>Tech Stack:</strong> <?= $project['tech_stack']; ?>
    </p>

    <img src="uploads/<?= $project['image']; ?>"
         alt="<?= $project['title']; ?>">

    <p class="long-desc">
        <?= nl2br($project['long_description']); ?>
    </p>

    <a href="<?= $project['demo_link']; ?>" target="_blank" class="btn primary">
        Live Demo
    </a>
</section>

<?php include "includes/footer.php"; ?>

