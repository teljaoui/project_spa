<header>
    <nav class="header-admin">
        <ul class="ul">
            <li class="logo">
                <a href="/"><img src="{{ asset('img/logotop.png') }}" alt=""srcset=""><span>Spa</span></a>
            </li>
            <li class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <span>Lien court</span><i class="fa-solid fa-link"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="/admin/index"><i
                                class="fa-solid fa-calendar-week"></i><span>Rendez-vous d'aujourd'hui</span></a></li>
                    <li><a class="dropdown-item" href="/admin/management"><i
                                class="fa-solid fa-list-check"></i><span>Gestion des rendez-vous</span></a></li>
                    <li><a class="dropdown-item" href="/admin/add"><i class="fa-solid fa-calendar-plus"></i><span>Ajouter un rendez-vous</span></a></li>
                    <li><a class="dropdown-item" href="/admin/past"><i class="fa-solid fa-outdent"></i><span>Rendez-vous passé</span></a></li>
                    <li><a class="dropdown-item" href="/admin/updatepassword"><i
                                class="fa-solid fa-pen-nib"></i><span>Changer le mot de passe</span></a></li>
                    <li><a class="dropdown-item logout" href="/admin/logout"><i
                                class="bi bi-box-arrow-left"></i><span>Déconnexion</span></a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
