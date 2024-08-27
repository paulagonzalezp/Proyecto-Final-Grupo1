document.addEventListener('DOMContentLoaded', (event) => {
    // Smooth scroll for navigation links
    document.querySelectorAll('a.nav-link').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Alert message for "Comienza Ahora" button
    document.getElementById('generate-plan').addEventListener('click', function (e) {
        alert('Generando el plan de alimentación...');
    });
});

function generateDietPlan() {
    // Your diet plan generation logic here
    document.getElementById('diet-plan').classList.remove('hidden');
}
