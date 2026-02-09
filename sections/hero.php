<section class="hero" id="hero">
    <div class="hero-content">

        <div class="hero-text">
            <p class="intro">👋 Hi, my name is</p>

            <h1 class="name"><?= $profile['name']; ?></h1>

            <h2 class="role"><?= $profile['title']; ?></h2>

            <p class="bio"><?= $profile['bio']; ?></p>

            <div class="hero-btn">
                <a href="#projects" class="btn primary">View Projects</a>
                <a href="#contact" class="btn outline">Contact Me</a>
            </div>
        </div>

        <div class="hero-image">
            <img src="assets/img/profile.png" alt="<?= $profile['name']; ?>">
        </div>

    </div>
</section>
