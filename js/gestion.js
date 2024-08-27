document.addEventListener('DOMContentLoaded', function() {
    const recipesTable = document.getElementById('recipes-table').getElementsByTagName('tbody')[0];
    const createRecipeForm = document.getElementById('createRecipeForm');
    const editRecipeForm = document.getElementById('editRecipeForm');
    const filterButtons = {
        all: document.getElementById('filter-all'),
        breakfast: document.getElementById('filter-breakfast'),
        lunch: document.getElementById('filter-lunch'),
        dinner: document.getElementById('filter-dinner'),
    };

    // Datos iniciales
    let recipes = [
        { id: 1, name: 'Omelette de Espinacas', type: 'desayuno', ingredients: 'Espinacas, huevos, sal' },
        { id: 2, name: 'Ensalada de Pollo', type: 'almuerzo', ingredients: 'Pollo, lechuga, tomate' },
        { id: 3, name: 'Sopa de Verduras', type: 'cena', ingredients: 'Verduras, caldo, sal' }
    ];

    // Renderizar recetas
    function renderRecipes(filter = 'all') {
        recipesTable.innerHTML = '';
        const filteredRecipes = filter === 'all' ? recipes : recipes.filter(r => r.type === filter);
        filteredRecipes.forEach(recipe => {
            const row = recipesTable.insertRow();
            row.innerHTML = `
                <td>${recipe.id}</td>
                <td>${recipe.name}</td>
                <td>${recipe.type}</td>
                <td>${recipe.ingredients}</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" data-id="${recipe.id}" data-bs-toggle="modal" data-bs-target="#editRecipeModal"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="${recipe.id}"><i class="bi bi-trash"></i></button>
                </td>
            `;
        });

        // Añadir eventos de edición y eliminación
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const recipeId = this.getAttribute('data-id');
                const recipe = recipes.find(r => r.id == recipeId);
                document.getElementById('edit-recipe-id').value = recipe.id;
                document.getElementById('edit-recipe-name').value = recipe.name;
                document.getElementById('edit-recipe-type').value = recipe.type;
                document.getElementById('edit-recipe-ingredients').value = recipe.ingredients;
            });
        });

        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const recipeId = this.getAttribute('data-id');
                recipes = recipes.filter(r => r.id != recipeId);
                renderRecipes(filter);
            });
        });
    }

    // Añadir nueva receta
    createRecipeForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const newRecipe = {
            id: recipes.length + 1,
            name: createRecipeForm.elements.name.value,
            type: createRecipeForm.elements.type.value,
            ingredients: createRecipeForm.elements.ingredients.value
        };
        recipes.push(newRecipe);
        renderRecipes();
        $('#createRecipeModal').modal('hide');
        createRecipeForm.reset();
    });

    // Editar receta existente
    editRecipeForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const recipeId = parseInt(editRecipeForm.elements.id.value, 10);
        const updatedRecipe = {
            id: recipeId,
            name: editRecipeForm.elements.name.value,
            type: editRecipeForm.elements.type.value,
            ingredients: editRecipeForm.elements.ingredients.value
        };
        recipes = recipes.map(r => r.id === recipeId ? updatedRecipe : r);
        renderRecipes();
        $('#editRecipeModal').modal('hide');
    });

    // Filtrar recetas
    filterButtons.all.addEventListener('click', function() {
        renderRecipes('all');
    });

    filterButtons.breakfast.addEventListener('click', function() {
        renderRecipes('desayuno');
    });

    filterButtons.lunch.addEventListener('click', function() {
        renderRecipes('almuerzo');
    });

    filterButtons.dinner.addEventListener('click', function() {
        renderRecipes('cena');
    });

    // Renderizar todas las recetas al cargar la página
    renderRecipes();
});
