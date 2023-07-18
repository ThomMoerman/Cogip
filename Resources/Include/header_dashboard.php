<header>
    <section class="header__section">
        <div class="section__page__name">
            <h1>Dashboard</h1>
            <p>dashbord/</p>
        </div>
        <div class="section__welcome__client">
            <div class="welcome__client__text">
                <?php session_start();
                if (isset($_SESSION['user_name'])): ?>
                    <h2>Welcome back
                        <?php echo $_SESSION['user_name'] ?>!
                    </h2>
                <?php endif ?>
                <p>You can here add an invoice, a company and some contacts</p>
            </div>
            <div class="welcome__client__image">
                <img src="../assets/img/dashboard_illustration.svg" alt="Image display a man working on computer">
            </div>
        </div>
    </section>
</header>