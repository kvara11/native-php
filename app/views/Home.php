<?php $this->loadModule('Header'); ?>






    <div class="banner home-banner">
            <?php if(!$localizedData) { ?>
                <style type="text/css">
                    .home-banner{
                        width: 100%;
                        overflow: hidden;
                        position: relative;
                    }
                    .bg-video{
                        position: absolute;
                        z-index: 0;
                        /*background: url(foo.jpg) no-repeat;*/
                        background-size: 100% 100%;
                        top: 0px;
                        left: 0px;
                        min-width: 100%;
                        min-height: 100%;
                        width: auto;
                        height: auto;
                    }


                </style>
            <video class="bg-video" autoplay loop muted>
                <source src="/assets/video/triton-banner-video_sm.mp4" type="video/mp4">
                <source src="/assets/video/triton-banner-video_sm.webm" type="video/webm">
                <source src="/assets/video/triton-banner-video_sm.ogv" type="video/ogg">
            </video>
            <?php } else { ?>
                <style type="text/css">
                    .home-banner{
                        width: 100%;
                        overflow: hidden;
                    }
                    .home-banner-image-container{
                        display: block;
                        position: absolute;
                        width: 100%;
                        height: 100%;
                        top: 0; left: 0; right: 0; bottom: 0;
                        background-color: #e1dfde;
                        transition: all 1s;
                    }
                    @media only screen and (min-width : 919px) {
                        .home-banner-image-container{
                            background-image: url('<?= ContentModel::getImageFolder ('3000x3000') . $localizedData->getBackgroundImage () ?>');
                            background-image: url('<?= ContentModel::getImageFolder ('3000x3000') . $localizedData->getBackgroundImage () ?>'), rgba(45,57,67,.8); /* For browsers that do not support gradients */
                            background-image: -webkit-linear-gradient(rgba(45,57,67,.7),rgba(45,57,67,.4)), url('<?= ContentModel::getImageFolder ('3000x3000') . $localizedData->getBackgroundImage () ?>');
                            background-image: -o-linear-gradient(rgba(45,57,67,.7),rgba(45,57,67,.4)), url('<?= ContentModel::getImageFolder ('3000x3000') . $localizedData->getBackgroundImage () ?>');
                            background-image: -moz-linear-gradient(rgba(45,57,67,.7),rgba(45,57,67,.4)), url('<?= ContentModel::getImageFolder ('3000x3000') . $localizedData->getBackgroundImage () ?>');
                            background-image: linear-gradient(rgba(45,57,67,.7), rgba(45,57,67,.4)), url('<?= ContentModel::getImageFolder ('3000x3000') . $localizedData->getBackgroundImage () ?>');
                            background-blend-mode: multiply;
                            background-size: 104% auto;
                            background-position: center center;
                            background-repeat: no-repeat;
                        }
                    }
                    .zoomout{
                        background-size: 100% auto;
                        transition: all 1s;
                    }
                    @media only screen and (min-width : 992px) and (max-width : 1199px) {
                        .home-banner-image-container{
                            background-size: 112% auto;
                        }
                        .zoomout{
                            background-size: 109% auto;
                        }
                    }

                </style>
                <div class="home-banner-image-container"></div>
                <img src="/img/photo-overlay-horizontal-top-left.png" class="photo-overlay-left" style="mix-blend-mode: multiply;">
            <?php } ?>
        <div class="home-banner-overlay"></div>
        
        <div class="wrapper clear">

                <div class="calculator-wrapper homepage-calculator" id="calculator">
                    <h1 class="calculator-headline"><?php echo $page["Feature"]["Headline"]; ?></h1>
                    <div class="col50 calculator-block">
                        
                        <form class="clear form-standard calculator-form">
                            <div class="calc-title-holder">
                                <h3 class="calc-title">Get an Instant Estimate</h3>
                            </div>
                            <div>
                                <label>What would you like funding for?</label>
                                <select id="funding_type">
                                    <option name="Business Equipment" value="equipment">Business Equipment</option>
                                    <option name="Software/Technology" value="equipment">Software/Technology</option>
                                    <option name="Inventory/Materials" value="bridge">Inventory/Materials</option>
                                    <option name="New Project" value="bridge">New Project</option>
                                    <option name="Another Business Expense" value="bridge">Another Business Expense</option>
                                </select>
                            </div>

                            <div class="clear">
                                <label>How much do you want to borrow?</label>
                                <div id="slider"></div>
                                <div class="min-max">
                                    <span class="left">5k</span><span class="right">250k</span>
                                    <div class="clear"></div>
                                </div>
                                <input type="text" name="loan_amount" id="calc-amount" class="dollar-amount" />
                            </div>
                            <div class="clear estimated-payment-box">
                                <div class="payment-amount">
                                    <span class="small">Estimated payment:</span>
                                    <span class="payment">$600/month</span>
                                    <span id="SmallTermLength" class="small">for 60 months</span>
                                </div>
                                <a href="#" class="view-payment-details">&nbsp;Details</a>
                            </div>

                            <div class="apply-container">
                                <label class="center">Ready to get started?</label>
                                <input type="submit" value="Apply Now" class="button" />
                            </div>

                            <div class="slideout-details loan-details">
                                <a href="javascript:void(0);" class="close-btn">close</a>
                                <h3>Estimate overview</h3>
                                <p>Note: This is not a financing approval. A financing decision and the loan amount, term and rate will be based on our review of your business and credit, and subject to our underwriting requirements.</p>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Amount to finance:</td>
                                            <td class="amount-to-finance">$25,000</td>
                                        </tr>
                                        <tr>
                                            <td>Intended use</td>
                                            <td id="IntendedUse">Business Equipment</td>
                                        </tr>
                                        <tr>
                                            <td>Financing type</td>
                                            <td id="FinanceType">Equipment Financing</td>
                                        </tr>
                                        <tr>
                                            <td>Term</td>
                                            <td><span id="TermLength">60</span> months</td>
                                        </tr>
                                        <!--<tr>
                                            <td>End of term option</td>
                                            <td>N/A <span class="info-box"><a href="javascript:void(0);" class="more-info-icon">i</a><span class="info-text">Nothing ($0) due at end of term.</span></span></td>
                                        </tr>-->
                                        <tr>
                                            <td>Sample credit</td>
                                            <td>A+</td>
                                        </tr>
                                        <tr>
                                            <td>Sample time in business</td>
                                            <td>2+ years</td>
                                        </tr>
                                        <tr>
                                            <td>Estimated payment</td>
                                            <td><span class="month-rate">$600</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="apply-container">
                                    <label class="center">Ready to get started?</label>
                                    <input type="submit" value="Apply Now" class="button" />
                                </div>
                            </div>
                        </form>

                        

                    </div><!-- end calculator-block -->

                    <div class="clear"></div>
                </div><!-- end calculator-wrapper -->
            
        </div><!-- end wrapper -->
    </div>

    <main class="main home" role="main">

        <section class="text-on-white intro-section">
            <div class="wrapper">
                <?php echo $page["Feature"]["main_content"]; ?>
            </div>
        </section>

        <section class="services-section">
            <div class="wrapper clear">
                <article class="col33 center">
                    <img src="/img/working-capital-icon.png" class="service-icon-img" alt="Triton Working Capital">
                    <h2><?php echo $page["Left Callout"]["headline"]; ?></h2>
                    <p><?php echo $page["Left Callout"]["statement"]; ?></p>
                    <a href="<?php echo $page["Left Callout"]["cta_url"]; ?>" class="learn-more-link center"><?php echo $page["Left Callout"]["cta_text"]; ?></a>
                </article>
                <article class="col33 center">
                    <img src="/img/equipment-loans-icon.png" class="service-icon-img" alt="Triton Equipment Loans">
                    <h2><?php echo $page["Center Callout"]["headline"]; ?></h2>
                    <p><?php echo $page["Center Callout"]["statement"]; ?></p>
                    <a href="<?php echo $page["Center Callout"]["cta_url"]; ?>" class="learn-more-link center"><?php echo $page["Center Callout"]["cta_text"]; ?></a>
                </article>
                <article class="col33 center">
                    <img src="/img/offer-financing-icon.png" class="service-icon-img" alt="Offer Financing through Triton">
                    <h2><?php echo $page["Right Callout"]["headline"]; ?></h2>
                    <p><?php echo $page["Right Callout"]["statement"]; ?></p>
                    <a href="<?php echo $page["Right Callout"]["cta_url"]; ?>" class="learn-more-link center"><?php echo $page["Right Callout"]["cta_text"]; ?></a>
                </article>
            </div>
        </section>

        <section class="lowest-payment-callout">
            <div class="wrapper">
                <img src="/img/lowest-payment-badge-blue.png" class="lowest-payment-badge" alt="Triton's Lowest Payment Guarantee" />
                <div class="textwrap">
                    <h2>Lowest Payment Guarantee</h2>
                    <p>You'll always get the best price - we guarantee it.</p>
                    <a href="/lowest-payment-guarantee" class="learn-more-link blue">Find Out More</a>
                </div>
            </div>  
        </section>

        <section class="testimonials-slider-section">
            <h2 class="center">Success Stories</h2>
            <div class="testimonials">
                <?php foreach ($testimonials as $testimonial) { ?>

                    <div class="testimonial">
                        <div class="clear wrapper">
                            <div class="testimonial-wrap">
                                <div class="testimonial-img-frame" style="background-image: url('<?php echo RESOURCE_ARTICLE_IMAGE_FOLDER . $testimonial['image']; ?>')"></div>
                                <p class="testimonial-text">"<?php echo $testimonial['quote']; ?>"</p>
                                <span class="quote-by"><?php echo $testimonial['name']; ?>, <?php echo $testimonial['title']; ?>, <?php echo $testimonial['company']; ?></span>
                                <?php if(!empty($testimonial['custom_link'])){ ?>
                                <a href="<?php echo $testimonial['custom_link']; ?>" class="learn-more-link">View Success Story</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </section>

    </main>

<?php $this->loadModule('Footer'); ?>
