<?php $this->loadModule('Header'); ?>
    <div class="color-banner lpg-banner" style="background-image: url('<?php echo MAIN_IMAGE_FOLDER . $page["Banner Content"]["banner_image"]; ?>');">
        <div class="wrapper">
            <div class="center">
                <h1><?php echo $page['Banner Content']['banner_headline']; ?></h1>
                <h4><?php echo $page['Banner Content']['banner_subhead']; ?></h4>
            </div>
        </div><!-- end wrapper -->
    </div>

    <main class="main lpg-main" role="main">

        <section>
            <div class="wrapper">
                <div class="text-on-white center">
                    <?php //echo $page["Lowest Payment"]["content"]; ?>
                    <h2><?php echo $page['Intro Copy']['intro_headline']; ?></h2>
                    <p><?php echo $page['Intro Copy']['intro_paragraph']; ?></p>
                </div>
            </div>
        </section>

        <section class="lpg-how-it-works">
            <div class="wrapper">
                <img src="<?php echo MAIN_IMAGE_FOLDER . $page['How it Works']['image']; ?>" />
                <div class="lpg-how-works-content">
                    <?php echo $page['How it Works']['how_works_content']; ?>
                    <p class="small">You can read all the fine print by <a href="/lowest-payment-terms">clicking here.</a></p>
                </div>
            </div>
        </section>


        <section class="lpg-testimonial">
            <div class="wrapper">
                <blockquote>
                    "I always do my homework before making an important business decision. I looked into other lenders, but Triton Capital offers better terms along with a much better customer service experience."
                </blockquote>
                <span class="quote-author">- Karen Klaess, Brea CA</span>
            </div>
        </section>


        <section class="lpg-ctas">
            <div class="wrapper center">
                <h2><?php echo  $page['CTAs Section']['headline']; ?></h2>
                <div class="row">
                    <div class="cta-block wc-cta">
                        <img src="/img/working-capital-icon.png">
                        <h3>Working Capital</h3>
                        <p><?php echo  $page['CTAs Section']['working_capital_text']; ?></p>
                        <a href="https://apply.tritoncptl.com/working-capital" class="button">Apply for Working Capital</a>
                    </div>
                    <div class="cta-block eq-cta">
                        <img src="/img/equipment-loans-icon.png">
                        <h3>Equipment Loans</h3>
                        <p><?php echo  $page['CTAs Section']['equipment_loans_text']; ?></p>
                        <a href="https://apply.tritoncptl.com" class="button">Apply for an Equipment Loan</a>
                    </div>
                </div>
            </div>
        </section>


        <section class="">
            <div class="wrapper">
                
            </div>
        </section>

    </main>

<?php $this->loadModule('Footer'); ?>