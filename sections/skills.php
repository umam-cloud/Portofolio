<section class="skills" id="skills">
    <h3>Skills</h3>

    <div class="skill-grid">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM skills");
        while ($skill = mysqli_fetch_assoc($query)) :
        ?>
            <div class="skill-card">
                <h4><?= $skill['name']; ?></h4>
                <span><?= $skill['level']; ?></span>
            </div>
        <?php endwhile; ?>
    </div>
</section>
