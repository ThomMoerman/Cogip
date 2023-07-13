<header>
    <h1 class="header__title">COGIP</h1>
    <div class="nav header__navbar">
        <a type="link" href="/" class="btn navbar__home_btn home_link">HOME</a>
        <a type="link" href="/invoices" class="btn navbar__invoices_btn invoices_link">INVOICES</a>
        <a type="link" href="/companies" class="btn navbar__compagnies_btn companies_link">COMPANIES</a>
        <a type="link" href="/contacts" class="btn navbar__contacts_btn contacts_link">CONTACTS</a>
    </div>
    <?php
    session_start();
    // Vérifier si l'utilisateur est connecté
    if (isset($_SESSION['user_id'])) {
        // Vérifier le rôle de l'utilisateur
        if ($_SESSION['user_role'] == 1) {
            echo '<div class="log header__log">
                  <a href="/dashboard" class="btn log__logout_btn logout_link">DASHBOARD</a> 
                  <a href="/logout" class="btn log__logout_btn logout_link">LOGOUT</a>
                  </div>';
        } elseif($_SESSION['user_role'] == 2){
            echo '<div class="log header__log">
                  <a href="/logout" class="btn log__logout_btn logout_link">LOGOUT</a>
                  </div>';
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

</header>