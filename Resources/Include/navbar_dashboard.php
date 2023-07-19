<section id="dashboard__navbar">
        <div class="navbar__admin_block">
            <img src="../assets/img/Avatar_two.svg" alt="profile pic">
            <h3>
            <?php session_start();
            echo $_SESSION['user_name'];
            echo '<br>';
            echo $_SESSION['user_lastName'];
            ?>
            </h3>
        </div>
        <hr class="navbar__hline">
        <div class="navbar__buttons">
            <a class="nav btn_dashboard" href="/">HomePage</a>
            <a class="nav btn_dashboard" href="/dashboard">Dashboard</a>
            <a class="nav btn_invoices" href="/invoices_add">Invoices</a>
            <a class="nav btn_companies" href="/companies_add">Companies</a>
            <a class="nav btn_contacts" href="/contacts_add">Contacts</a>
        </div>
        <hr class="navbar__hline">
        <div class="navbar__logout">
        <img class="log btn_logout" src="../assets/img/Avatar_two.svg" alt="profile pic">
        <a class="nav btn_logout" href="/logout" style="text-decoration: none;">Logout</a>
        </div>
    </section>