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
    
    closeBtn.style.display = "inline-block"; 
    openBtn.style.display = "none"; 
    serviceAdd.style.display = "block"; 
    }
    
    function closeForm() {
    const openBtn = document.querySelector('.open');
    const closeBtn = document.querySelector('.close');
    const serviceAdd = document.querySelector('.service_add');
    
    openBtn.style.display = "inline-block"; 
    closeBtn.style.display = "none";
    serviceAdd.style.display = "none"; 
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