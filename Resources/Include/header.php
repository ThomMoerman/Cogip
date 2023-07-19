<head>
<script src="assets/js/nav_location.js" defer></script>
</head>
<header>

<section class="header_top">
        <div class="header_top_left">
            <div class="nav header__logo">
                <h1 class="header__title">COGIP</h1>
            </div>
            <div class="nav header__navbar">
                <a type="link" href="/" class="btn navbar__home_btn home_link">Home</a>
                <a type="link" href="/invoices" class="btn navbar__invoices_btn invoices_link">Invoices</a>
                <a type="link" href="/companies" class="btn navbar__compagnies_btn companies_link">Companies</a>
                <a type="link" href="/contacts" class="btn navbar__contacts_btn contacts_link">Contacts</a>
            </div>
        </div>
            <div class="nav header__login">
            <?php
                session_start();
                // Vérifier si l'utilisateur est connecté
                if (isset($_SESSION['user_id'])) {

                    if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 3) {
                        // Afficher le lien de déconnexion
                        echo '
                        <div class="header__log">
                            <a href="/dashboard" class="btn log__logout_btn logout_link">Dashboard</a>
                            <a href="/logout" class="btn log__logout_btn logout_link">LOGOUT</a>
                        </div>';
                    } elseif($_SESSION['user_role'] == 2){
                        echo '<a href="/logout" class="btn log__logout_btn logout_link">LOGOUT</a>';
                    }
                }else {
                    // Afficher le bloc de connexion
                    echo '
                    <div class="log header__log">
                        <a type="link" href="/register" class="btn log__signup_btn signup_link">SIGN UP</a>
                        <a type="link" href="/login" class="btn log__login_btn login_link">LOGIN</a>
                    </div>';
                }
            ?>
            </div>
    </section>
    <section class="header_bottom">
        <div id="white_rectangle">
            <img src="../assets/img/rectangle_header.svg" alt="white rectangle">
        </div>
    </section>
</header>