<nav class="navbar">
    <div class="nav-logo">
        <a href="#hero">Umam</a>
    </div>

    <?php if ($page === "home"): ?>
        <ul class="nav-menu">
            <li><a href="index.php#hero" class="nav-link active">Home</a></li>
            <li><a href="index.php#about" class="nav-link">About</a></li>
            <li><a href="index.php#skills" class="nav-link">Skills</a></li>
            <li><a href="index.php#projects" class="nav-link">Projects</a></li>
            <li><a href="index.php#contact" class="nav-link">Contact</a></li>
        </ul>
    <?php else: ?>
        <p>Project Details</p>
    <?php endif; ?>

    <button class="dark-toggle" onclick="toggleDark()">🌙</button>
</nav>
