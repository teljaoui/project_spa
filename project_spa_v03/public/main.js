function shownavhome() {
    const show = document.querySelector(".header-bottom");
    show.style.top = 0
}
function closenavhome() {
    const show = document.querySelector(".header-bottom");
    show.style.top = "-1000%"
}

function openForm() {
const closeBtn = document.querySelector('.close');
const openBtn = document.querySelector('.open');
const serviceAdd = document.querySelector('.service_add');

closeBtn.style.display = "inline-block"; // Affiche le bouton "Fermer"
openBtn.style.display = "none"; // Cache le bouton "Ajouter"
serviceAdd.style.display = "block"; // Affiche le formulaire
}

function closeForm() {
const openBtn = document.querySelector('.open');
const closeBtn = document.querySelector('.close');
const serviceAdd = document.querySelector('.service_add');

openBtn.style.display = "inline-block"; // Réaffiche le bouton "Ajouter"
closeBtn.style.display = "none"; // Cache le bouton "Fermer"
serviceAdd.style.display = "none"; // Cache le formulaire
}



document.querySelector('.logout').addEventListener("click", function (event) {
    if (!confirm("Êtes-vous sûr de vouloir vous déconnecter ?")) {
        event.preventDefault();
    }
});

document.querySelectorAll('.confirmedelete').forEach(function (e) {
    e.addEventListener("click", function (event) {
        if (!confirm("Êtes-vous sûr de vouloir supprimer cet élément ?")) {
            event.preventDefault();
        }
    })
});