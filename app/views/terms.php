<?php $this->loadModule('Header'); ?>
    <div class="color-banner">
        <div class="wrapper">
            <div class="center">
                <h1><?php echo $page["Content"]["headline"]; ?></h1>
                <p><?php echo $page["Content"]["statement"]; ?></p>
            </div>
        </div><!-- end wrapper -->
    </div>

    <main class="main privacy-policy" role="main">

        <section>
            <div class="text-on-white wrapper">
                <?php echo $page["Content"]["main_content"]; ?>
            </div>
        </section>

    </main>

<?php $this->loadModule('Footer'); ?>