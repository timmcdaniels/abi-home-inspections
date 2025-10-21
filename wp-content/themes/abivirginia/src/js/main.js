import '../scss/style.scss';
document.addEventListener('DOMContentLoaded', () => {
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
    $navbarBurgers.forEach(el => {
        el.addEventListener('click', () => {
            const target = el.dataset.target;
            const $target = document.getElementById(target);
            el.classList.toggle('is-active');
            $target.classList.toggle('is-active');
        });
    });
	const faqToggles = document.querySelectorAll('.faq-question-toggle');
    faqToggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
            const answer = toggle.nextElementSibling;
            const icon = toggle.querySelector('.fa-angle-down');
            const messageArticle = toggle.closest('.message');
            answer.classList.toggle('is-hidden');
            messageArticle.classList.toggle('is-active');
            icon.classList.toggle('fa-rotate-180');
        });
    });
});
