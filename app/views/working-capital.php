<?php
    $db = Database::getInstance ();
    $this->loadModule ('Header');
?>

    <div class="banner" style="background-image: url('<?php echo MAIN_IMAGE_FOLDER . $page["Content"]["image"]; ?>');">
        <img src="/img/photo-overlay-horizontal-top-left.png" class="photo-overlay-left">
        <div class="wrapper">
            <div class="banner-text">
                <h1><?php echo $page["Content"]["headline"]; ?></h1>
                <?php

                    echo ($page["Content"]["statement"] != '' ? '<p>' . $page["Content"]["statement"] . '</p>' : '');
                    echo ($page["Content"]["cta"] != '' ? '<a href="#qualify-section" class="learn-more-link blue">' . $page["Content"]["cta"] . '</a>' : '');

                ?>
            </div>
        </div><!-- end wrapper -->
    </div>

    <main class="main working-capital" role="main">

        <section class="text-on-white intro-section working-capital-overview">
            <div class="wrapper clear">
                <?php echo $page["Content"]["main_content"]; ?>
            </div>
        </section>

        <section class="icon-links-section">
            <div class="wrapper">
                <p>Select an industry to learn more.</p>
                <ul class="clear">
                    <?php
                        foreach ( $db->query ("select page_name, url_slug, icon, industry_short_description from landing_pages where parent = 1 order by display_order") as $landing_page ) {
                            ?>
                            <li><a href="/working-capital/<?php echo $landing_page['url_slug']; ?>" class="icon-link"
                                   style="background-image: url('/assets/img/content-340x250/<?php echo $landing_page['icon'] ?>');"><?php echo $landing_page['page_name']; ?>
                                    <span class="description"><?php echo $landing_page['industry_short_description']; ?></span></a>
                            </li>

                        <?php } ?>
                </ul>
            </div>
        </section>

        <section class="blue-callout-info">
            <div class="wrapper center borrow-with-confidence">
                <?php echo $page["Content"]["secondary_content"]; ?>
            </div>
            <div class="recently-funded-header">
                <div class="wrapper">
                    <?php echo $page["Content"]["third_content"]; ?>
                </div>
            </div>
        </section>

        <section class="recently-funded-section">
            <ul class="recently-funded clear">
                <li class="col33"
                    style="background-image: url('<?php echo MAIN_IMAGE_FOLDER . $recently_funded_slides[0]["image"]; ?>');">
                    <img src="/img/photo-overlay-vertical-top-left.png" class="photo-overlay-left">
                    <div>
                        <span class="funding-use"><?php echo $recently_funded_slides[0]["industry"]; ?></span><span> / <?php echo $recently_funded_slides[0]["amount"]; ?></span>
                    </div>
                </li>
                <li class="col33"
                    style="background-image: url('<?php echo MAIN_IMAGE_FOLDER . $recently_funded_slides[1]["image"]; ?>');">
                    <img src="/img/photo-overlay-vertical-top-left.png" class="photo-overlay-left">
                    <div>
                        <span class="funding-use"><?php echo $recently_funded_slides[1]["industry"]; ?></span><span> / <?php echo $recently_funded_slides[1]["amount"]; ?></span>
                    </div>
                </li>
                <li class="col33"
                    style="background-image: url('<?php echo MAIN_IMAGE_FOLDER . $recently_funded_slides[2]["image"]; ?>');">
                    <img src="/img/photo-overlay-vertical-top-left.png" class="photo-overlay-left">
                    <div>
                        <span class="funding-use"><?php echo $recently_funded_slides[2]["industry"]; ?></span><span> / <?php echo $recently_funded_slides[2]["amount"]; ?></span>
                    </div>
                </li>
            </ul>
        </section>

        <section id="qualify-section" class="qualify-section">
            <div class="wrapper">
                <?php echo $page["Content"]["process_headline"]; ?>
                <ul class="clear center form-steps-overview">
                    <li class="col33">
                        <img src="/img/apply-icon.png" alt="Step 1 - Apply" />
                        <h3><?php echo $page["Content"]["step_1_headline"]; ?></h3>
                        <p><?php echo $page["Content"]["step_1_statement"]; ?></p>
                    </li>
                    <li class="col33">
                        <img src="/img/approval-icon.png" alt="Step 2- Approval" />
                        <h3><?php echo $page["Content"]["step_2_headline"]; ?></h3>
                        <p><?php echo $page["Content"]["step_2_statement"]; ?></p>
                    </li>
                    <li class="col33">
                        <img src="/img/funding-icon.png" alt="Step 3 - Funding" />
                        <h3><?php echo $page["Content"]["step_3_headline"]; ?></h3>
                        <p><?php echo $page["Content"]["step_3_statement"]; ?></p>
                    </li>
                </ul>
            </div><!-- end wrapper -->
            <div class="qualify-form-wrap">
                <div class="wrapper">
                    <form class="clear form-standard qualify-form" method="get">
                        <a href="javascript:void(0);" id="back-step" style="display: none;"><img
                                    src="/img/white-arrow-left.png"/></a>
                        <input type="hidden" id="loan_amount" name="loan_amount">
                        <input type="hidden" id="loan_type" name="loan_type">

                        <div class="qualify-steps-numbers">
                            <div class="steps-wrap">
                                <a href="javascript:void(0);" id="qualify-step-1-link" class="active">1</a>
                                <a href="javascript:void(0);" id="qualify-step-2-link">2</a>
                                <a href="javascript:void(0);" id="qualify-step-3-link">3</a>
                                <a href="javascript:void(0);" id="qualify-step-4-link">4</a>
                            </div>
                        </div>

                        <div data-steps-index="1" class="qualify-steps-content" id="qualify-step-1-content">
                            <div class="question">
                                <h3><?php echo $page["Form"]["question_1"]; ?></h3>
                                <p class="supporting"><?php echo $page["Form"]["question_1_statement"]; ?></p>
                            </div>
                            <script>
                                $(document).ready(function () {
                                    $('#gross_revenue').keyup(function (event) {
                                        if (KeysPressed.getCode(event) == 8 || !KeysPressed.isInputNavigation(event)) {
                                            var target = event.target,
                                                val = $(target).val(),
                                                cursor = new Cursor(target);

                                            cursor.get();
                                            val = Frmt.money(val, 0);
                                            val = val.replace(/^\$/, '');
                                            $(target).val(val).trigger('change');
                                            cursor.set();
                                        }
                                    });
                                });
                            </script>
                            <div class="options">
                                <input type="text" value="1,500,000" name="gross_revenue" class="dollar-amount"
                                       id="gross_revenue">
                                <p class="error revenue_error" style="display: none;">Gross annual revenue must be at
                                    least $100,000</p>
                                <input type="radio" id="step-1-continue"><label for="step-1-continue"
                                                                                class="qualify-form-radio">Continue</label>
                            </div>
                        </div><!-- end step 1 -->

                        <div data-steps-index="2" class="qualify-steps-content" id="qualify-step-2-content"
                             style="display: none">
                            <div class="question">
                                <h3><?php echo $page["Form"]["question_2"]; ?></h3>
                                <p class="supporting"><?php echo $page["Form"]["question_2_statement"]; ?></p>
                            </div>
                            <div class="options">
                                <input type="radio" name="how_soon" value="1 - 4 days" id="need_in_1-4_days"><label
                                        for="need_in_1-4_days" class="qualify-form-radio">1 - 4 days</label>
                                <input type="radio" name="how_soon" value="7 - 10 days" id="need_in_7-10_days"><label
                                        for="need_in_7-10_days" class="qualify-form-radio">7 - 10 days</label>
                                <input type="radio" name="how_soon" value="10-30 Days" id="10-30_days"><label
                                        for="10-30_days" class="qualify-form-radio">10-30 Days</label>
                                <input type="radio" name="how_soon" value="Greater than 30 Days"
                                       id="greater_than_30_days"><label for="greater_than_30_days"
                                                                        class="qualify-form-radio">Greater than 30
                                    Days</label>
                            </div>
                        </div><!-- end step 2 -->

                        <div data-steps-index="3" class="qualify-steps-content" id="qualify-step-3-content"
                             style="display: none">
                            <div class="question">
                                <h3><?php echo $page["Form"]["question_3"]; ?></h3>
                                <p class="supporting"><?php echo $page["Form"]["question_3_statement"]; ?></p>
                            </div>
                            <div class="options">
                                <input type="radio" name="are_you_profitable" value="Yes" id="profitable_yes"><label
                                        for="profitable_yes" class="qualify-form-radio">Yes</label>
                                <input type="radio" name="are_you_profitable" value="No" id="profitable_no"><label
                                        for="profitable_no" class="qualify-form-radio">No</label>
                            </div>
                        </div><!-- end step 3 -->

                        <div data-steps-index="4" class="qualify-steps-content" id="qualify-step-4-content"
                             style="display: none">
                            <div class="question">
                                <h3><?php echo $page["Form"]["question_4"]; ?></h3>
                                <p class="supporting"><?php echo $page["Form"]["question_4_statement"]; ?></p>
                            </div>
                            <div class="options">
                                <input type="radio" name="whats_your_fico" value="750 - 800" id="fico_750-800"><label
                                        for="fico_750-800" class="qualify-form-radio">750 - 800</label>
                                <input type="radio" name="whats_your_fico" value="700 - 750" id="fico_700-750"><label
                                        for="fico_700-750" class="qualify-form-radio">700 - 750</label>
                                <input type="radio" name="whats_your_fico" value="650 - 700" id="fico_650-700"><label
                                        for="fico_650-700" class="qualify-form-radio">650 - 700</label>
                                <input type="radio" name="whats_your_fico" value="600 - 650" id="fico_600-650"><label
                                        for="fico_600-650" class="qualify-form-radio">600 - 650</label>
                                <input type="radio" name="whats_your_fico" value="< 600" id="fico_under_600"><label
                                        for="fico_under_600" class="qualify-form-radio">< 600</label>
                            </div>
                        </div><!-- end step 4 -->

                        <div data-steps-index="5" class="qualified-message-cta" id="qualify-step-5-content"
                             style="display: none;">
                            <div class="loan-type-message"></div>
                            <div id="bridge-loan-table" class="loan-info-table" style="display: none">
                                <a href="javascript:void(0);" class="close-btn">close</a>
                                <div class="details-top">
                                    <h4>Working Capital</h4>
                                    <ul>
                                        <li>Funding from $10K - $500K</li>
                                        <li>6 - 24 month terms</li>
                                        <li>Rates at 9% (Total Interest Percentage) <a href="javascript:void(0);"
                                                                                       class="info-icon">i</a><span
                                                    class="info-text">Total Interest Percentage calculates the total amount of interest you pay as a percentage of your loan amount. For example, if you have a $10,000 loan with a 9% Total Interest Percentage, you will pay back $900 in interest, or $10,900 total.</span>
                                        </li>
                                        <li>2% origination fee</li>
                                        <li>Approval in 2 - 4 hours</li>
                                        <li>Monthly, weekly, or daily payment options</li>
                                    </ul>
                                </div>
                                <div class="details-bottom">
                                    <h5>Required Documents</h5>
                                    <ul>
                                        <li>Last 3 months of bank statements (all pages)</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="contact-ctas">
                                <input type="submit" value="Start Application Process" class="button"/>
                                <p>Or, contact us to discuss:</p>
                                <a href="javascript:void(0);" onclick="olark('api.box.expand')" class="cta-btn chat"></a>
                                <a href="tel:8778221333" class="cta-btn call"></a>
                                <a id="emailCTABtn" class="cta-btn email"></a>
                                <p class="call-us">Call us at (877) 822-1333</p>
                            </div>
                        </div><!-- end step 5 (final screen) -->

                    </form>
                </div><!-- end wrapper-->
            </div>
            <div class="clear"></div>
        </section>

    </main>

<?php $this->loadModule ('Footer'); ?>