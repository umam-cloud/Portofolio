<section class="projects" id="projects">
    <h3>Projects</h3>

    <div class="project-grid">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM projects ORDER BY created_at DESC");
        while ($project = mysqli_fetch_assoc($query)) :
        ?>
            <div class="project-card">
                <img src="uploads/<?= $project['image']; ?>" alt="<?= $project['title']; ?>">

                <h4><?= $project['title']; ?></h4>
                <p><?= $project['description']; ?></p>

                <a href="<?= $project['demo_link']; ?>" target="_blank" class="btn small">
                    Live Demo
                </a>

                <a href="project-detail.php?id=<?= $project['id']; ?>" class="btn small outline">
                    View Detail
                </a>
            </div>
        <?php endwhile; ?>
    </div>
</section>
