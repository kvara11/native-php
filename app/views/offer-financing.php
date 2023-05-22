<?php $this->loadModule('Header'); ?>

    <div class="banner" style="background-image: url('<?php echo MAIN_IMAGE_FOLDER . $page["Content"]["image"]; ?>');">
        <img src="/img/photo-overlay-horizontal-top-left.png" class="photo-overlay-left">
        <div class="wrapper">
            <div class="banner-text">
                <h1><?php echo $page["Content"]["headline"]; ?></h1>
                <?php

                    echo ($page["Content"]["statement"] != '' ? '<p>' . $page["Content"]["statement"] . '</p>' : '');
                    echo ($page["Content"]["cta"] != '' ? '<a href="#financing-contact" class="learn-more-link blue whitepaper-link financing-contact-link">' . $page["Content"]["cta"] . '</a>' : '');

                ?>
            </div>
        </div>
    </div>

    <main class="main offer-financing" role="main">

        <section class="text-on-white intro-section offer-financing-overview">
            <div class="wrapper clear">
                <?php //echo $page["Content"]["main_content"]; ?>
                <div class="col50 info-block">
                    <img src="/img/increase-customer-base-icon.png" alt="Increase Customer Base" />
                    <p class="bold">Increase customer base.</p>
                    <p>82% of business equipment is purchased with financing. Expand the number of customers who can buy from you simply by providing a financing option.</p>
                </div>
                <div class="col50 info-block">
                    <img src="/img/increase-purchase-size-icon.png" alt="Increase purchase size" />
                    <p class="bold">Increase purchase size.</p>
                    <p>Splitting an invoice into small monthly payments gives your customers purchasing power that allows them to buy additional equipment with the same budget.</p>
                </div>
                <div class="col50 info-block">
                    <img src="/img/improve-customer-experience-icon.png" alt="Improve the customer experience" />
                    <p class="bold">Improve the customer experience.</p>
                    <p>Allowing clients a choice in how they’d like to complete their purchase provides much needed flexibility and increases customer loyalty. The more options they have to pay you, the easier the decision becomes.</p>
                </div>
                <div class="col50 info-block">
                    <img src="/img/streamline-sales-process-icon.png" alt="Streamline your sales process" />
                    <p class="bold">Streamline your sales process.</p>
                    <p>Financing boosts your sales by integrating seamlessly into your existing process. Sales close faster and more efficiently when financing is offered.</p>
                </div>
            </div>
        </section>

        <section class="how-it-works">
            <div class="wrapper center">
                <h2>How Triton Financing works.</h2>
                <p>Triton Capital's cutting-edge financing transforms your sales process by allowing customers to pay for equipment in small monthly installments. </p>
                <a href="#get-online-quote" class="learn-more-link white financing-calculator-link">See how much your customers will pay</a>
                <div class="clear financing-steps">
                    <div class="col25 step"><p>Become an approved partner.</p></div>
                    <div class="col25 step"><p>Integrate financing and send a referral.</p></div>
                    <div class="col25 step"><p>Your customer gets loan approval.</p></div>
                    <div class="col25 step"><p>You get paid in full.</p></div>
                </div>
            </div>
        </section>

        <section class="testimonials-section">
            <div class="wrapper center">
                <p class="quote">"Never had I experienced such easy funding for a customer."</p>
                <p class="byline">Zino Altman, Azot LLC</p>
            </div>
        </section>

        <section class="financing-features">
            <div class="clear row financing-solutions">
                <div class="wrapper">
                    <h2>Financing solutions.</h2>
                    <p>Grow your sales by providing simple and transparent financing for your customers. We offer an elegant customer experience with proven lift on top-line sales.</p>
                    <a href="#financing-contact" class="button financing-contact-link">Get Started</a>
                </div>
            </div>
            <div class="clear row virtual-tools">
                <div class="wrapper">
                    <h2>Virtual tools.</h2>
                    <p>Our online tools plug in seamlessly with your website, allowing you and your customers to get quotes and submit applications. You'll hear back about an approval within a few hours.</p>
                    <a href="#financing-contact" class="button financing-contact-link">Get Started</a>
                </div>
            </div>
            <div class="clear row white-labeled-materials">
                <div class="wrapper">
                    <h2>White-labeled materials.</h2>
                    <p>Empower your sales team and move more equipment. Instantly send an application to your customer's smartphone or computer and give them the easiest path to purchasing.</p>
                    <a href="#financing-contact" class="button financing-contact-link">Get Started</a>
                </div>
            </div>
        </section>

        <section class="testimonials-section">
            <div class="wrapper center">
                <p class="quote">"We've used other lenders in the past, but Triton's attention to detail and quick funding has really set them apart."</p>
                <p class="byline">JC Becker, Miramar Bobcat</p>
            </div>
        </section>

        <section class="financing-calculator-section" id="get-online-quote">
            <div class="clear wrapper">
                <h2>Small payments, more sales.</h2>
                <div class="calculator-wrapper">
                    <p class="center">Use our payment calculator to estimate financing we can provide for your customers.</p>
                    <div class="row clear">
                        <div class="finance-input">
                            <form class="clear form-standard calculator-form wc-calculator">
                                <label>Equipment price:</label>
                                <input type="text" name="financing_amount" id="financing-amount" class="dollar-amount" value="10,000">
                            </form>
                        </div>
                        <div class="finance-estimate">
                            <p>Estimated customer payment:</p>
                            <div class="payment"><span class="amount" id="offer-monthly-payment">$693</span>/month</div>
                            <div class="term">
                                <p class="small">Term (in months):</p>
                                <a class="offer-term" href="javascript:void(0)" data-term="24">24</a>
                                <a class="offer-term" href="javascript:void(0)" data-term="36">36</a>
                                <a class="offer-term" href="javascript:void(0)" data-term="48">48</a>
                                <a class="offer-term selected" href="javascript:void(0)" data-term="60">60</a>
                            </div>
                        </div>
                    </div>
                    <p class="center">Have questions about how to get started?</p>
                    <a href="#financing-contact" class="button financing-contact-link">Send us a message</a>
                </div>
            </div>
        </section><!-- end calculator-section -->

        <section class="icon-links-section">
            <div class="wrapper">
                <p>We provide financing for a variety of industries:</p>
                <ul class="clear">
                    <li><a href="javascript:void(0)" class="icon-link construction">Construction</a></li>
                    <li><a href="javascript:void(0)" class="icon-link transportation">Transportation</a></li>
                    <li><a href="javascript:void(0)" class="icon-link manufacturing">Manufacturing</a></li>
                    <li><a href="javascript:void(0)" class="icon-link restaurants">Restaurants</a></li>
                    <li><a href="javascript:void(0)" class="icon-link technology">Technology</a></li>
                    <li><a href="javascript:void(0)" class="icon-link printing">Printing</a></li>
                    <li><a href="javascript:void(0)" class="icon-link medical">Medical</a></li>
                    <li><a href="javascript:void(0)" class="icon-link more">More Choices</a></li>
                </ul>
            </div>
        </section>

        <section class="offer-financing-basics">
            <div class="wrapper">
                <h3>Some of the basics:</h3>
                <ul>
                    <li>
                        <p class="bold">How do I get paid by Triton Capital?</p>
                        <p>We pay our partners in full when customers purchase equipment. Whether you prefer wire, ACH, or overnight check, the choice is yours. Our goal is to get you paid, fast.</p>
                    </li>
                    <li>
                        <p class="bold">What happens if my customers don't pay?</p>
                        <p>Simply put, nothing. Triton assumes the credit risk from your buyers' loan performance so you can focus on growing your business.</p>
                    </li>
                    <li>
                        <p class="bold">What rates can I offer my customers?</p>
                        <p>Our equipment loan rates start at 5.99%, with most applicants qualifying between 5.99-10% fixed.</p>
                    </li>
                    <li>
                        <p class="bold">How do I start offering financing? </p>
                        <p>Submit your contact info <a href="#financing-contact" class="financing-contact-link">here</a>. You'll hear from us within a business day. We work hard to learn your business and your customers' needs, and develop a financing strategy that adds value to your sales process.</p>
                    </li>
                    <li>
                        <p class="bold">How do I tell customers about financing?</p>
                        <p>Triton offers sales support for both offline and online marketing. From promotional and digital banners to onsite trade show assistance, we partner with you to maximize your sales through financing.</p>
                    </li>
                </ul>
            </div>
        </section>

        <section class="support-team-section">
            <div class="clear wrapper team-wrapper">
                <img src="/img/team-members-group.jpg" class="whole-team-photo" alt="Triton Capital Team" />

                <div class="team-members-photo team-members-photo-jordan">
                    <div class="pullUp"><img src="img/jordan-cutout-shadow.png"/><p>Jordan</p></div>
                </div>
                <div class="team-members-photo team-members-photo-haley">
                    <div class="pullUp"><img src="img/haley-cutout-shadow.png"/><p>Haley</p></div>
                </div>
                <div class="team-members-photo team-members-photo-matt">
                    <div class="pullUp"><img src="img/matt-cutout-shadow.png"/><p>Matt</p></div>
                </div>
                <div class="team-members-photo team-members-photo-kelsey">
                    <div class="pullUp"><img src="img/kelsey-cutout-shadow.png"/><p>Kelsey</p></div>
                </div>
            </div>
        </section>

        <section class="financing-contact-section" id="financing-contact">
            <div class="wrapper">
                <p class="center">We have a dedicated team in San Diego at Triton Capital HQ. <br />We're ready to help out and answer your questions however we can.</p>
                <form class="clear form-standard finance-form" action="/offer-financing/submit" method="post">
                    <input type="hidden" name="origination" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                    <h3 class="center">Learn more about our financing</h3>
                    <div class="contact-objective">
                        <label>I'd like to:</label>
                        <span class="radio"><input type="radio" name="objective" value="signup">Sign up</span>
                        <span class="radio"><input type="radio" name="objective" value="schedule_consultation">Schedule a consultation</span>
                        <span class="radio"><input type="radio" name="objective" value="receive_information">Receive more information</span>
                    </div>
                    <div class="col50">
                        <label>First name</label>
                        <input type="text" name="first_name" id="first-name" />
                    </div>
                    <div class="col50">
                        <label>Last name</label>
                        <input type="text" name="last_name" id="last-name" />
                    </div>
                    <div class="col50">
                        <label>Email address</label>
                        <input type="text" name="email_address" id="email-address" />
                    </div>
                    <div class="col50">
                        <label>Website</label>
                        <input type="text" name="website" id="website" />
                    </div>
                    <div class="col50">
                        <label>Do you currently offer financing?</label>
                        <span class="radio"><input type="radio" name="currently_finance" value="yes">Yes</span>
                        <span class="radio"><input type="radio" name="currently_finance" value="no">No</span>
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
                        <label>Mobile number</label>
                        <input type="text" name="sms" id="phone_number">
                        <p class="error" style="display: none;">Please provide your mobile phone number.</p>
                    </div>
                    <div class="clear"></div>
                    <input type="submit" value="Contact Me" class="button" />
                </form>
                <div id="contact-form-success" style="display: none;">
                    <p>Thank you for reaching out to us. A representative will contact you within 1 business day, if you need immediate assistance please call 877-822-1333 or email info@tritoncptl.com.</p>
                </div>
            </div>
        </section>
    </main>

<?php $this->loadModule('Footer'); ?>