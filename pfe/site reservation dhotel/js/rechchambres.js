// Simuler une liste de chambres
const chambres = [
  {
    id: 1,
    nom: "Chambre Simple",
    description: "1 lit simple, Wi-Fi gratuit, petit déjeuner inclus.",
    prix: 5000,
    image: "images/chambre1.jpg"
  },
  {
    id: 2,
    nom: "Chambre Double",
    description: "1 lit double, vue sur la ville, climatisation.",
    prix: 7500,
    image: "images/chambre2.jpg"
  },
  {
    id: 3,
    nom: "Suite Familiale",
    description: "2 lits doubles, salon privé, télévision, mini-bar.",
    prix: 12000,
    image: "images/chambre3.jpg"
  }
];

function afficherChambres() {
  const roomList = document.getElementById("roomList");
  roomList.innerHTML = ""; // Réinitialise la liste des chambres

  chambres.forEach(chambre => {
    const roomCard = document.createElement("div");
    roomCard.classList.add("room-card");

    roomCard.innerHTML = `
      <img src="${chambre.image}" alt="${chambre.nom}">
      <h3>${chambre.nom}</h3>
      <p>${chambre.description}</p>
      <p class="price">${chambre.prix} DA / nuit</p>
      <button onclick="voirDisponibilite(${chambre.id})">Afficher la disponibilité</button>
    `;
    roomList.appendChild(roomCard);
  });
}

// Fonction pour appliquer le filtre
function appliquerFiltre() {
  const prixMax = document.getElementById("prixMax").value;
  const chambresFiltrees = chambres.filter(chambre => chambre.prix <= prixMax);
  
  // Réafficher les chambres filtrées
  const roomList = document.getElementById("roomList");
  roomList.innerHTML = ""; // Réinitialise la liste

  chambresFiltrees.forEach(chambre => {
    const roomCard = document.createElement("div");
    roomCard.classList.add("room-card");

    roomCard.innerHTML = `
      <img src="${chambre.image}" alt="${chambre.nom}">
      <h3>${chambre.nom}</h3>
      <p>${chambre.description}</p>
      <p class="price">${chambre.prix} DA / nuit</p>
      <button onclick="voirDisponibilite(${chambre.id})">Afficher la disponibilité</button>
    `;
    roomList.appendChild(roomCard);
  });
}

// Fonction pour retourner à la page des hôtels
function retour() {
  window.location.href = "../rechhotel.html"; // Redirige vers la page des hôtels
}

// Appel initial pour afficher les chambres
afficherChambres();
