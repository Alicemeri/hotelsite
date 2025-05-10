document.addEventListener('DOMContentLoaded', () => {
    const searchButton = document.querySelector('.search-button');
    const searchInput = document.querySelector('.search-input');
    const dateArrivee = document.getElementById('date_arrivee');
    const dateDepart = document.getElementById('date_depart');
    const resultat = document.getElementById('resultat');

    if (searchButton) {
        searchButton.addEventListener('click', () => {
            const destination = searchInput.value.trim();
            const arrivee = dateArrivee.value;
            const depart = dateDepart.value;

            if (!destination || !arrivee || !depart) {
                alert('Veuillez remplir tous les champs.');
                return; // ❌ Ne pas rediriger
            }

            // ✅ Tous les champs sont remplis, on peut rediriger
            window.location.href = 'pages/rechhotels.html';
        });

        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchButton.click();
            }
        });
    }
});
