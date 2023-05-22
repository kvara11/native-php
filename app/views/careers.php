<?php $this->loadModule('Header'); ?>
    <div class="color-banner careers-banner" style="background-image: url('/img/careers-banner.jpg');">
        <div class="wrapper">
            <div class="banner-text">
                <h2><?php echo $page["Content"]["headline"]; ?></h2>
                <p><?php echo $page["Content"]["sub_headline"]; ?></p>
            </div>
        </div><!-- end wrapper -->
    </div>

    <main class="main careers" role="main">

        <section class="careers-intro-section">
            <div class="text-on-white wrapper">
                <?php echo $page["Content"]["intro_text"]; ?>
            </div>
        </section> 


        <section class="careers-openings-section">
            <div class="wrapper">
                <h3>We are currently looking for:</h3>
                <ul class="job-listings">
                    <?php foreach ( $jobListings as $jobListing ) {?>
                        <li><a href="#" data-id="<?= $jobListing['job_id'] ?>"><?= $jobListing['job_title'] ?></a></li>
                    <?php } ?>
                    
                </ul>

                <div class="job-description-wrapper">
                    <a href="#" class="close-window"></a>
                    <?php foreach ( $jobListings as $jobListing ) {?>
                    <div class="job-description" data-id="<?= $jobListing['job_id'] ?>">
                        <?= $jobListing['job_body'] ?>
                    </div>
                    <?php } ?>
                </div>
                <!-- all job postings should be here, hidden -->


                <div class="clear"></div>

                <div class="smallprint">
                    <p>Triton Capital is an Equal Employment Opportunity (EEO) employer. It is the policy of Triton Capital to provide equal employment opportunities to all qualified applicants without regard to race, color, religion, sex (including pregnancy), gender identity, sexual orientation, national origin, age, protected veteran or disabled status.</p>
                </div>

            </div><!-- end wrapper -->
        </section>

    </main>



<?php $this->loadModule('Footer'); ?>