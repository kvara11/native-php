<?php $this->loadModule('Header'); ?>

    <div class="color-banner <?php echo $type; ?>">
        <div class="wrapper">
            <div class="center">
                <h1><?php echo $page["Content"]["headline"]; ?></h1>
            </div>
        </div><!-- end wrapper -->
    </div>

    <main class="main <?php echo $type; ?>" role="main">
        <section class="simple-landing-message">
                <div class="wrapper">
                <?php echo $page["Content"]["main_content"]; ?>
            </div>
        </section>
    </main>

    <script type="text/javascript">
        $('.open-chat').click(function(){
            olark('api.box.expand');
        });
    </script>

<?php $this->loadModule('Footer'); ?>