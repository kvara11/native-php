<?php $this->loadModule('Header'); ?>

    <div class="banner" style="background-image: url('<?php echo MAIN_IMAGE_FOLDER . $page["Content"]["image"]; ?>');">
        <img src="/img/photo-overlay-horizontal-top-left.png" class="photo-overlay-left">
        <div class="wrapper">
            <div class="banner-text">
                <h2><?php echo $page["Content"]["headline"]; ?></h2>
                <p><?php echo $page["Content"]["statement"]; ?></p>
            </div>
        </div><!-- end wrapper -->
    </div>

    <main class="main about-us" role="main">

        <section class="text-on-white intro-section about-us-intro">
            <div class="wrapper clear">
                <?php echo $page["Content"]["main_content"]; ?>
            </div>
        </section>

        <section class="triton-features-section">
            <div class="clear wrapper">
                <h2>Business Loans Made Easy</h2>
                <div class="triton-feature-item">
                    <img src="/img/about-faster-funding-icon.png" alt="Faster to Funding" />
                    <h4>Faster to Funding</h4>
                    <p>We work exclusively with banks that can provide funding is as little as 2 days.</p>
                </div>
                <div class="triton-feature-item">
                    <img src="/img/about-better-tech-icon.png" alt="Better Technology" />
                    <h4>Better Technology</h4>
                    <p>Our secure systems are built with a focus on positive user experiences.</p>
                </div>
                <div class="triton-feature-item">
                    <img src="/img/about-lowest-payment-icon.png" alt="Lowest Payment" />
                    <h4>Lowest Payment</h4>
                    <p>We guarantee the lowest payment on your loan. <a href="/lowest-payment">Learn more</a>.</p>
                </div>
            </div>
        </section>

        <section class="core-values-section">
            <div class="wrapper">
                <?php echo $page["Content"]["secondary_content"]; ?>
            </div>
        </section>


        <section class="featured-in-section">
            <div class="clear wrapper">
                <h2>We specialize in small business funding, as featured in:</h2>
                <img src="/img/bloomberg-logo.png" class="featured-in-logo" alt="Bloomberg" />
                <img src="/img/new-york-times-logo.png" class="featured-in-logo" alt="New York Times" />
                <img src="/img/cnbc-logo.png" class="featured-in-logo" alt="CNBC" />
                <img src="/img/forbes-logo.png" class="featured-in-logo" alt="Forbes" />
                <img src="/img/entrepreneur-logo.png" class="featured-in-logo" alt="Entrepreneur" />
            </div>
        </section>


        <section class="text-on-white history-section">
            <div class="wrapper">
                <?php echo $page["Content"]["third_content"]; ?>
            </div>
        </section>


        <section class="testimonials-section-1">
            <div class="wrapper">
                <div class="testimonial-type-1">
                    <div class="testimonial-wrap">
                        <img src="/img/client-photo-circle1.png" class="testimonial-photo" alt="Jose Gonzalez, President, Paradise Printing" />
                        <p class="testimonial-text">"Our business has grown substantially thanks to the Triton Capital team. I appreciate the relationship we've developed and turn to them for our business needs."</p>
                        <span class="quote-by">Jose Gonzalez, President, Paradise Printing</span>
                    </div>
                </div>
                <div class="testimonial-type-1">
                    <div class="testimonial-wrap">
                        <img src="/img/client-photo-circle2.png" class="testimonial-photo" alt="Mike Gilligan, Co-Founder, Burger Lounge" />
                        <p class="testimonial-text">"I've been in the banking and finance industry a long time, and Triton Capital exceeded my expectations in every way."</p>
                        <span class="quote-by">Mike Gilligan, Co-Founder, Burger Lounge</span>
                    </div>
                </div>
            </div>
        </section>

    </main>

<?php $this->loadModule('Footer'); ?>