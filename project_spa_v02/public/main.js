function shownavhome() {
    const show = document.querySelector(".header-bottom");
    show.style.top = 0
}
function closenavhome() {
    const show = document.querySelector(".header-bottom");
    show.style.top = "-1000%"
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