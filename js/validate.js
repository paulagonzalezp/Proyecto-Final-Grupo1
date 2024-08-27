function validateContactForm() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let message = document.getElementById('message').value;

    if (name === "" || email === "" || message === "") {
        alert("Todos los campos son obligatorios.");
        return false;
    }

    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Por favor, ingrese un correo electrónico válido.");
        return false;
    }

    return true;
}

function validateRegisterForm() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirm_password').value;
    let diabetesType = document.getElementById('diabetes_type').value;
    let activityLevel = document.getElementById('activity_level').value;
    let foodPreferences = document.getElementById('food_preferences').value;
    let healthGoals = document.getElementById('health_goals').value;

    if (name === "" || email === "" || password === "" || confirmPassword === "" || diabetesType === "" || activityLevel === "" || foodPreferences === "" || healthGoals === "") {
        alert("Todos los campos son obligatorios.");
        return false;
    }

    if (password !== confirmPassword) {
        alert("Las contraseñas no coinciden.");
        return false;
    }

    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Por favor, ingrese un correo electrónico válido.");
        return false;
    }

    return true;
}

function validateTrackingForm() {
    let date = document.getElementById('date').value;
    let mealType = document.getElementById('meal_type').value;
    let foodConsumed = document.getElementById('food_consumed').value;
    let quantity = document.getElementById('quantity').value;

    if (date === "" || mealType === "" || foodConsumed === "" || quantity === "") {
        alert("Todos los campos son obligatorios.");
        return false;
    }

    return true;
}
