
document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter-animate');
    counters.forEach(counter => {
        const target = parseFloat(counter.getAttribute('data-target'));
        const duration = 1500;
        const steps = 60;
        const stepTime = Math.abs(Math.floor(duration / steps));
        const increment = target / steps;
        let current = 0;

        const timer = setInterval(() => {

        current += increment;
        if (current >= target) {
            counter.innerText = target.toFixed(1);
            clearInterval(timer);
        } else {
            counter.innerText = current.toFixed(1);
        }
        }, stepTime);

    });
});
