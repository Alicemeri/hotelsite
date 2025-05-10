document.addEventListener("DOMContentLoaded", () => {
    const hotels = [
      { nom: "Hôtel El Djazair", prix: 8000, etoiles: 5, image: "images/hotel1.jpg" },
      { nom: "Hôtel Oasis", prix: 6000, etoiles: 4, image: "images/hotel2.jpg" },
      { nom: "Hôtel Belle Vue", prix: 4500, etoiles: 3, image: "images/hotel3.jpg" }
    ];
  
    const hotelList = document.getElementById("hotelList");
    const prixMaxInput = document.getElementById("prixMax");
    const etoilesSelect = document.getElementById("etoiles");
    const filtrerBtn = document.getElementById("filtrerBtn");

    function ouvrirChambres(nomHotel) {
      localStorage.setItem("hotelNom", nomHotel);
      window.location.href = "C:/Users/Ajax/Desktop/site reservation dhotel/pages/rechchambres.html";
    }
  
    function afficherHotels(liste) {
      hotelList.innerHTML = "";
      liste.forEach(hotel => {
        hotelList.innerHTML += `
          <div class="hotel-card">
            <img src="${hotel.image}" alt="${hotel.nom}">
            <div class="hotel-info">
              <h2>${hotel.nom}</h2>
              <p>Prix moyen: ${hotel.prix} DA</p>
              <p>Étoiles: ${hotel.etoiles} ★</p>
              <button class="select-hotel" onclick="ouvrirChambres('${hotel.nom}')">Voir les chambres</button>
            </div>
          </div>
        `;
      });
    }
    
    
  
    afficherHotels(hotels);
  
    filtrerBtn.addEventListener("click", () => {
      const max = parseInt(prixMaxInput.value);
      const etoiles = parseInt(etoilesSelect.value);
  
      const resultat = hotels.filter(hotel => {
        return (!max || hotel.prix <= max) && (!etoiles || hotel.etoiles === etoiles);
      });
  
      afficherHotels(resultat);
    });
  });
  