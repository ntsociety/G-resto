
<footer class = "bg-dark py-5 wrapper">
    <div class = "container">
        <div class = "row text-white g-4">
            <div class = "col-md-6 col-lg-4">
                <a class = "text-uppercase text-decoration-none brand text-white font-weight-bold" href = "#">Dtech Resto</a>
                <p>
                © <script>
                    document.write(new Date().getFullYear())
                  </script>,
                  fait par
                  <p class="font-weight-bold">Dtech Groupe</p>
                  <a href="https://cabinetdtech.com" class="font-weight-bold" target="_blank" style="color: yellow; text-transform: uppercase;" >Visiter notre site web</a>
                </p>
            </div>

            <div class = "col-md-6 col-lg-4">
                <h5 class = "fw-light text-secondary">Liens</h5>
                <ul class = "list-unstyled">
                    <li class = "my-3">
                        <a href = "{{ url('/') }}" class = "text-white text-decoration-none text-muted">
                            <i class = "fas fa-chevron-right me-1"></i> ACCUEIL
                        </a>
                    </li>
                    <li class = "my-3">
                        <a href = "{{ url('categories') }}" class = "text-white text-decoration-none text-muted">
                            <i class = "fas fa-chevron-right me-1"></i> CATEGORIES
                        </a>
                    </li>
                    <li class = "my-3">
                        <a href = "{{ url('menus') }}" class = "text-white text-decoration-none text-muted">
                            <i class = "fas fa-chevron-right me-1"></i> MENUS
                        </a>
                    </li>

                </ul>
            </div>

            <div class = "col-md-6 col-lg-4">
                <h5 class = "fw-light mb-3 text-secondary">Contactez nous</h5>
                <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                    <span class = "me-3">
                        <i class = "fas fa-map-marked-alt"></i>
                    </span>
                    <span class = "fw-light">
                        Siège cabinet DTECH GROUP, Avedji Limozine
                    </span>
                </div>
                <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                    <span class = "me-3">
                        <i class = "fas fa-envelope"></i>
                    </span>
                    <span class = "fw-light">
                        contact@cabinetdtech.com
                    </span>
                </div>
                <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                    <span class = "me-3">
                        <i class = "fas fa-phone"></i>
                    </span>
                    <span class = "fw-light">
                        +228 92 89 89 79
                    </span>

                </div>
            </div>

            
        </div>

    </div>
</footer>
