<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Portofolio - Home</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<header>
    <div class="nav-container">
        <div class="nav-logo">MyPortofolio</div>
        <nav>
            <a href="home.php">Home</a>
            <a href="index.php">Projects</a>
            <a href="#skills">Skills</a>
            <a href="#contact">Contact</a>
        </nav>
    </div>
</header>

<section class="hero-content" data-aos>
    <div class="hero-text">
        <h1>Hi, I'm Developer</h1>
        <h2>Web Developer & Designer</h2>
        <p>Selamat datang di portofolio saya. Di sini kamu bisa melihat project, keterampilan, dan informasi pribadi saya.</p>
        <a class="hero-btn" href="index.php">Lihat Project</a>
    </div>

    <div class="hero-image">
        <img src="assets/profile.jpg" alt="Profile Image" />
    </div>
</section>

<section class="bio-section" data-aos>
    <div class="bio-image"><img src="assets/profile2.jpg" alt="Bio Photo" /></div>
    <div class="bio-details">
        <h2>Tentang Saya</h2>
        <p>Saya adalah seorang web developer yang berfokus pada pembuatan website modern, responsif, dan interaktif. Menguasai HTML, CSS, JS, PHP, MySQL.</p>
        <p>Saya suka membuat website dengan animasi transisi halus menggunakan CSS modern.</p>
    </div>
</section>

<section id="skills" class="skills-section" data-aos>
    <h2>Skills</h2>
    <div class="skills-grid">
        <div class="skill-card">HTML</div>
        <div class="skill-card">CSS</div>
        <div class="skill-card">JavaScript</div>
        <div class="skill-card">PHP</div>
        <div class="skill-card">MySQL</div>
        <div class="skill-card">UI/UX</div>
    </div>
</section>

<section class="projects-section" data-aos>
    <h2>Latest Projects</h2>
    <div class="projects-grid">
        <?php
        $q = mysqli_query($conn, "SELECT * FROM projects ORDER BY id DESC LIMIT 6");
        while ($p = mysqli_fetch_assoc($q)) : ?>
            <div class="project-card">
                <?php if ($p['image']): ?>
                    <img src="uploads/<?= htmlspecialchars($p['image']); ?>" alt="<?= htmlspecialchars($p['title']); ?>" />
                <?php endif; ?>
                <h3><?= htmlspecialchars($p['title']); ?></h3>
                <p><?= nl2br(htmlspecialchars(substr($p['description'],0,150))); ?>...</p>
                <?php if ($p['link']): ?>
                    <a class="btn" href="<?= htmlspecialchars($p['link']); ?>" target="_blank">Visit</a>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
    <div style="text-align:center;margin-top:20px;"><a class="btn" href="index.php">Lihat Semua Project</a></div>
</section>

<footer id="contact">
    <div class="footer-inner">
        <div><h3>Contact</h3><p>Email: yourname@example.com</p></div>
        <div><p>© 2025 MyPortofolio — All Rights Reserved.</p></div>
    </div>
</footer>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const els = document.querySelectorAll('[data-aos]');
    els.forEach((el, i) => setTimeout(() => el.classList.add('aos-animate'), i * 140));
});
</script>
</body>
</html>
