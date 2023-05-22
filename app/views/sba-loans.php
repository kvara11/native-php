<?php $this->loadModule('Header'); ?>

    <div class="banner" style="background-image: url('<?php echo MAIN_IMAGE_FOLDER . $page["Banner Content"]["image"]; ?>');">
        <img src="/img/photo-overlay-horizontal-top-left.png" class="photo-overlay-left">
        <div class="wrapper">
            <div class="banner-text">
                <h1><?php echo $page["Banner Content"]["headline"]; ?></h1>
                <?php
                   echo ($page["Banner Content"]["statement"] != '' ? '<p>' . $page["Banner Content"]["statement"] . '</p>' : '');
                   echo ($page["Banner Content"]["cta"] != '' ? '<a href="https://apply.tritoncptl.com/" class="learn-more-link blue">' . $page["Banner Content"]["cta"] . '</a>' : '');
                ?>
            </div>
        </div>
    </div>

    <main class="main sba-loans" role="main">

        <div class="clear loan-details-bar">
            <div class="col33 table-column">
                <h4>APR</h4>
                <span><?php echo $page["Banner Content"]["apr"]; ?></span>
            </div>
            <div class="col33 table-column">
                <h4>Time to Funding</h4>
                <span><?php echo $page["Banner Content"]["time_to_funding"]; ?></span>
            </div>
            <div class="col33 table-column">
                <h4>Loan Term</h4>
                <span><?php echo $page["Banner Content"]["loan_term"]; ?></span>
            </div>
        </div>


        <section class="text-on-white intro-section sba-loans-uses">
            <div class="wrapper clear">
                <?php echo $page["Loan Uses"]["html_content"]; ?>
            </div>
        </section>


        <section class="sba-how-it-works">
            <div class="clear wrapper">
                <?php echo $page["How it Works"]["html_content"]; ?>
            </div>
        </section>


        <section class="sba-loans-features">
            <div class="wrapper">
                <?php echo $page["SBA Loan Features"]["html_content"]; ?>
            </div>
        </section>


        <section class="sba-loans-bottom">
            <div class="clear">
                <?php echo $page["SBA Loans Bottom"]["html_content"]; ?>
            </div>
        </section>


  

    </main>

<?php $this->loadModule('Footer'); ?>