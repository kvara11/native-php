<?php $this->loadModule('Header'); ?>

    <div class="banner" style="background-image: url('<?php echo MAIN_IMAGE_FOLDER . $landing_page['top_feature_image']; ?>');">
        <div class="clear wrapper">
            <h1 class="loan-landing-headline"><?php echo $landing_page['headline'] ?></h1>
            <div class="loan-landing-top-form">
                <form class="clear form-standard" id="contact-form" action="/ajax/submit-contact-form">
                    <input type="hidden" name="origination" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                    <div class="col50">
                        <label>First name</label>
                        <input type="text" name="first_name" id="first-name">
                        <p class="error" style="display: none;">Please provide your first name.</p>
                    </div>
                    <div class="col50">
                        <label>Last name</label>
                        <input type="text" name="last_name" id="last-name">
                        <p class="error" style="display: none;">Please provide your last name.</p>
                    </div>
                    <div class="col50">
                        <label>Email address</label>
                        <input type="text" name="email_address" id="email-address">
                        <p class="error" style="display: none;">Please provide your email address.</p>
                    </div>
                    <div class="col50">
                        <label>Preferred contact method</label>
                        <select name="preferred_method" id="contact-method">
                            <option value="">Please select</option>
                            <option value="email">Email</option>
                            <option value="phone">Phone</option>
                            <option value="sms">SMS/Text message</option>
                        </select>
                    </div>
                    <div class="col50" id="phone-field">
                        <label>Phone Number</label>
                        <input type="text" name="phone" id="phone_number">
                        <p class="error" style="display: none;">Please provide your phone number.</p>
                    </div>
                    <div>
                        <input type="submit" value="Contact me" class="button" />
                    </div>
                    <input type="hidden" name="landing_page" value="<?php echo $landing_page['page_name'] ?>">
                </form>
                <div id="contact-form-success" style="display: none;">
                    <p>Thank you for reaching out to us. A representative will contact you within 1 business day, if you need immediate assistance please call 877-822-1333 or email info@tritoncptl.com.</p>
                </div>
                <div id="contact-form-error" style="display: none;">
                    <p style="color: red">An error occurred. For assistance please call 877-822-1333 or email info@tritoncptl.com.</p>
                </div>
            </div>
        </div><!-- end wrapper -->
    </div>

    <main class="main loan-landing eq-loan-landing" role="main">

        <section class="text-on-white intro-section">
            <div class="wrapper clear">
                <?php echo $landing_page['main_content']; ?>
            </div>
        </section>

        <section class="calculator-section" id="get-online-quote">
            <script>
                if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                 $('.calculator-section').prepend('<img src="/img/typing.gif" class="bg-gif" />');
                } else {
                    $('.calculator-section').prepend('<video autoplay muted loop poster="/img/typing-still.jpg" class="bg-vid"> <source src="/img/typing.webm" type="video/webm"> <source src="/img/typing.mp4" type="video/mp4"> <source src="/img/typing.ogv" type="video/ogg"> </video>');
                }
            </script>
            <div class="calculator-wrapper" id="calculator">
                <div class="clear wrapper">
                    <div class="col50 calculator-block">
                        <h2 class="calculator-title">Run payments</h2>
                        <form class="clear form-standard center calculator-form eq-calculator">
                            <div>
                                <label>How much do you want to borrow?</label>
                                <div id="slider"></div>
                                <div class="clear min-max">
                                    <span class="left">5k</span><span class="right">250k</span>
                                </div>
                                <input type="text" name="loan_amount" id="eq-amount" class="dollar-amount" />
                            </div>
                            <div class="clear estimated-payment-box">
                                <div class="payment-amount">
                                    <span class="small">Estimated payment:</span>
                                    <span class="payment">$600/month</span>
                                    <span class="small">for 60 months</span>
                                </div>
                                <a href="#" class="view-payment-details">View Details</a>
                            </div>
                            <div>
                                <input type="submit" value="Let's get started" class="button" />
                            </div>
                        </form>
                    </div>
                    <div class="col50 slideout-details eq-loan-details">
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
                                    <td>Buy equipment</td>
                                </tr>
                                <tr>
                                    <td>Financing type</td>
                                    <td>Equipment financing</td>
                                </tr>
                                <tr>
                                    <td>Term</td>
                                    <td>60 months</td>
                                </tr>
                                <tr>
                                    <td>End of term option</td>
                                    <td>$0, EFA <span class="info-box"><a href="javascript:void(0);" class="more-info-icon">i</a><span class="info-text">Nothing ($0) due at end of term.</span></span></td>
                                </tr>
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
                                    <td><span class="month-rate">$600</span>/month</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end calculator-wrapper -->
        </section><!-- end calculator-section -->

        <section class="text-on-white center loan-landing-bottom-content">
            <div class="wrapper clear">
                <?php echo $landing_page['secondary_content']; ?>
                <ul class="clear center callout-circles">
                    <li class="col33">
                        <img src="/img/circle-rates-terms.png" />
                        <h4>Rates & Terms</h4>
                        <p>Our equipment loan rates start at 5.99% with flexible terms from 12-60 months. Seasonal and deferral payments are also available by request.</p>
                    </li>
                    <li class="col33">
                        <img src="/img/circle-process.png" />
                        <h4>Our Process</h4>
                        <p>We’ve streamlined our financing to provide flexible equipment loans to <?php echo $page_name; ?> business owners. We tailor loans to meet your timeline and repayment needs.</p>
                    </li>
                    <li class="col33">
                        <img src="/img/circle-about-2.png" />
                        <h4>About Us</h4>
                        <p>Triton Capital is a relationship-driven lender that provides <?php echo $page_name; ?> equipment loans best aligned with your business needs. Get connected with a Client Advocate today.</p>
                    </li>
                </ul>
            </div>
        </section>

        <section class="loan-landing-buttons">
            <div class="wrapper center">
                <h2><?php echo $landing_page['cta_headline']; ?></h2>
                <?php if(!empty($landing_page['cta_button_1_label']) && !empty($landing_page['cta_button_1_url'])){ ?>
                    <a href="<?php echo $landing_page['cta_button_1_url']; ?>" class="button"><?php echo $landing_page['cta_button_1_label']; ?></a>
                <?php } ?>
                <?php if(!empty($landing_page['cta_button_2_label']) && !empty($landing_page['cta_button_2_url'])){ ?>
                    <a href="<?php echo $landing_page['cta_button_2_url']; ?>" class="button"><?php echo $landing_page['cta_button_2_label']; ?></a>
                <?php } ?>
                <?php if(!empty($landing_page['cta_button_3_label']) && !empty($landing_page['cta_button_3_url'])){ ?>
                    <a href="<?php echo $landing_page['cta_button_3_url']; ?>" class="button"><?php echo $landing_page['cta_button_3_label']; ?></a>
                <?php } ?>
            </div>
        </section>





    </main>

<?php $this->loadModule('FooterAlt'); ?>