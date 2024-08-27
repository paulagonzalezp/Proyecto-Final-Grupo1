document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.diabetes-type-option').forEach(option => {
        option.addEventListener('click', function() {
            document.querySelectorAll('.diabetes-type-option').forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
        });
    });

    document.getElementById('generate-plan').addEventListener('click', generateDietPlan);
});

function generateDietPlan() {
    const selectedType = document.querySelector('.diabetes-type-option.selected');
    const carbsInput = document.getElementById('carbs');
    const mealsSelect = document.getElementById('meals');

    const carbs = parseFloat(carbsInput.value);
    const meals = parseInt(mealsSelect.value);

    if (selectedType && !isNaN(carbs) && carbs > 0 && meals > 0) {
        // Mostrar el plan de dieta
        document.getElementById('diet-plan').classList.remove('hidden');
        document.getElementById('total-carbs').textContent = carbs;
        document.getElementById('total-carbs').classList.add('black-text'); // Aplicar clase negra

        const mealDetails = document.getElementById('meal-details');
        mealDetails.innerHTML = ''; // Limpiar contenido previo

        // Generar comidas basadas en el tipo de diabetes seleccionado
        for (let i = 1; i <= meals; i++) {
            const meal = document.createElement('div');
            meal.className = 'meal';
            meal.innerHTML = `
                <img src="../imagenes/ensalada-garbanzos.jpg" width="60" height="60">
                <strong class="black-text">Comida ${i}</strong> <!-- Aplicar clase negra -->
                <p class="black-text">Ejemplo de comida para la diabetes ${selectedType.textContent}</p> <!-- Aplicar clase negra -->
                <p class="black-text">Carbohidratos: ${(carbs / meals).toFixed(2)} g</p> <!-- Aplicar clase negra -->
            `;
            mealDetails.appendChild(meal);
        }
    } else {
        alert('Por favor, selecciona tu tipo de diabetes y proporciona una cantidad válida de carbohidratos.');
    }
}
