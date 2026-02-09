<section class="contact" id="contact">
    <h3>Let’s Connect</h3>

    <p style="max-width:600px;margin-bottom:30px;">
        Saya terbuka untuk diskusi, kolaborasi, maupun kesempatan kerja.
        Jangan ragu untuk menghubungi saya melalui platform berikut.
    </p>

    <div class="contact-links">
        <a href="mailto:<?= $profile['email']; ?>">
            <i class="fa-solid fa-envelope"></i>
            Email
        </a>

        <a href="<?= $profile['github']; ?>" target="_blank">
            <i class="fa-brands fa-github"></i>
            GitHub
        </a>

        <a href="<?= $profile['linkedin']; ?>" target="_blank">
            <i class="fa-brands fa-linkedin"></i>
            LinkedIn
        </a>

        <a href="<?= $profile['whatsapp']; ?>" target="_blank">
            <i class="fa-brands fa-whatsapp"></i>
            WhatsApp
        </a>

        <a href="<?= $profile['instagram']; ?>" target="_blank">
            <i class="fa-brands fa-instagram"></i>
            Instagram
        </a>
    </div>
</section>
