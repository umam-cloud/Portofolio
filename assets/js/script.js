// Dark Mode
function toggleDark() {
    document.body.classList.toggle("dark");
    localStorage.setItem("theme",
        document.body.classList.contains("dark") ? "dark" : "light"
    );
}

// Animasi Scroll
if (localStorage.getItem("theme") === "dark") {
    document.body.classList.add("dark");
}

const revealElements = document.querySelectorAll(
    '.skill-card, .project-card, .about p'
);

const revealOnScroll = () => {
    revealElements.forEach(el => {
        const top = el.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (top < windowHeight - 100) {
            el.classList.add('show');
        }
    });
};

window.addEventListener('scroll', revealOnScroll);
revealOnScroll();

// Navbar
const sections = document.querySelectorAll("section");
const navLinks = document.querySelectorAll(".nav-link");

window.addEventListener("scroll", () => {
    let current = "";

    sections.forEach(section => {
        const sectionTop = section.offsetTop - 120;
        if (scrollY >= sectionTop) {
            current = section.getAttribute("id");
        }
    });

    navLinks.forEach(link => {
        link.classList.remove("active");
        if (link.getAttribute("href") === `index.php#${current}`) {
            link.classList.add("active");
        }
    });
});

