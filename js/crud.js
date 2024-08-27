document.addEventListener('DOMContentLoaded', function() {
    const mealInput = document.getElementById('mealInput');
    const addMealBtn = document.getElementById('addMealBtn');
    const mealList = document.getElementById('mealList');
    const mealForm = document.getElementById('mealForm');

    // Cargar datos iniciales
    loadMeals();

    // Función para crear un nuevo ítem de comida
    function createMealItem(meal) {
        const li = document.createElement('li');
        li.className = 'list-group-item d-flex justify-content-between align-items-center';

        const span = document.createElement('span');
        span.textContent = meal.comida;

        const editBtn = document.createElement('button');
        editBtn.className = 'btn btn-sm btn-warning me-2';
        editBtn.textContent = 'Editar';

        const deleteBtn = document.createElement('button');
        deleteBtn.className = 'btn btn-sm btn-danger';
        deleteBtn.textContent = 'Eliminar';

        // Eventos de botones
        editBtn.addEventListener('click', () => editMealItem(meal.id, span));
        deleteBtn.addEventListener('click', () => deleteMealItem(meal.id, li));

        li.appendChild(span);
        li.appendChild(editBtn);
        li.appendChild(deleteBtn);
        
        return li;
    }

    // Cargar comidas desde el servidor
    function loadMeals() {
        fetch('crud.php?action=read')
            .then(response => response.json())
            .then(data => {
                mealList.innerHTML = ''; // Clear existing items
                data.forEach(meal => {
                    const mealItem = createMealItem(meal);
                    mealList.appendChild(mealItem);
                });
            })
            .catch(error => console.error('Error al cargar comidas:', error));
    }

    // Añadir nueva comida
    mealForm.addEventListener('submit', event => {
        event.preventDefault();
        const formData = new FormData(mealForm);

        fetch('crud.php?action=create', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadMeals();
                mealForm.reset();
            } else {
                alert('Error al agregar la comida.');
            }
        })
        .catch(error => console.error('Error al agregar comida:', error));
    });

    // Editar comida
    function editMealItem(id, span) {
        const newMealName = prompt('Editar comida', span.textContent);
        if (newMealName !== null && newMealName.trim() !== '') {
            fetch('crud.php?action=update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: id, comida: newMealName.trim() })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    span.textContent = newMealName.trim();
                } else {
                    alert('Error al editar la comida.');
                }
            })
            .catch(error => console.error('Error al editar comida:', error));
        }
    }

    // Eliminar comida
    function deleteMealItem(id, li) {
        if (confirm('¿Seguro que quieres eliminar esta comida?')) {
            fetch('crud.php?action=delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: id })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    li.remove();
                } else {
                    alert('Error al eliminar la comida.');
                }
            })
            .catch(error => console.error('Error al eliminar comida:', error));
        }
    }
});
