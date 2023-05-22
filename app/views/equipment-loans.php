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
                    echo ($page["Content"]["cta"] != '' ? '<a href="#get-quote-section" class="learn-more-link blue">' . $page["Content"]["cta"] . '</a>' : '');

                ?>
            </div>
        </div><!-- end wrapper -->
    </div>

    <main class="main equipment-loans" role="main">

        <section class="text-on-white intro-section">
            <div class="wrapper">
                <?php echo $page["Content"]["main_content"]; ?>
            </div>
        </section>

        <section class="icon-links-section">
            <div class="wrapper">
                <p>Select an industry to learn more.</p>
                <ul class="clear">
                    <?php
                        foreach ( $db->query ("select page_name, url_slug, icon, industry_short_description from landing_pages where parent = 2 order by display_order") as $landing_page ) {
                            ?>
                            <li><a href="/equipment-loans/<?php echo $landing_page['url_slug']; ?>" class="icon-link"
                                   style="background-image: url('/assets/img/content-340x250/<?php echo $landing_page['icon'] ?>');"><?php echo $landing_page['page_name']; ?>
                                    <span class="description"><?php echo $landing_page['industry_short_description']; ?></span></a>
                            </li>

                        <?php } ?>
                </ul>
            </div>
        </section>

        <section class="blue-callout-info">
            <div class="wrapper center our-customers-return">
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

        <section class="get-quote-section" id="get-quote-section">
            <div class="clear wrapper center">
                <h2 class="center">See your rate for an equipment loan.</h2>
                <ul class="clear center form-steps-overview">
                    <li class="col33">
                        <img src="/img/apply-icon.png" alt="Step 1 - Apply" >
                        <h3>Apply</h3>
                        <p>In as little as 60 seconds.</p>
                    </li>
                    <li class="col33">
                        <img src="/img/approval-icon.png" alt="Step 1 - Approval" >
                        <h3>Approval</h3>
                        <p>Terms available within 2-4 hours.</p>
                    </li>
                    <li class="col33">
                        <img src="/img/funding-icon.png" alt="Step 1 - Funding" >
                        <h3>Funding</h3>
                        <p>In as little as 1-2 days.</p>
                    </li>
                </ul>
            </div><!-- end wrapper -->
            <div class="eq-loan-form-wrap">
                <div class="wrapper">
                    <form class="clear form-standard qualify-form" method="get">

                        <a href="javascript:void(0);" id="back-step" style="display: none;"><img
                                    src="/img/white-arrow-left.png"/></a>

                        <div class="qualify-steps-numbers">
                            <div class="steps-wrap">
                                <a href="javascript:void(0);" id="qualify-step-1-link" class="active">1</a>
                                <a href="javascript:void(0);" id="qualify-step-2-link">2</a>
                            </div>
                        </div>

                        <!-- STEP 1 -->
                        <div data-steps-index="1" class="qualify-steps-content" id="qualify-step-1-content">
                            <div class="question">
                                <h3>How much is your equipment?</h3>
                                <p class="supporting"></p>
                            </div>
                            <script>
                                $(document).ready(function () {
                                    $('#equipment_cost').keyup(function (event) {
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
                                <input type="text" value="50,000" name="equipment_cost" class="dollar-amount"
                                       id="equipment_cost">
                                <p class="error equipment_cost_error" style="display: none;">Equipment cost must be at
                                    least $1,000</p>
                                <input type="radio" id="step-1-continue"><label for="step-1-continue"
                                                                                class="qualify-form-radio">Continue</label>
                            </div>
                        </div><!-- end step 1 -->

                        <!-- STEP 2 -->
                        <div data-steps-index="2" class="qualify-steps-content" id="qualify-step-2-content"
                             style="display: none;">
                            <div class="question">
                                <h3>What equipment are you buying?</h3>
                                <p class="supporting"></p>
                            </div>
                            <div class="options">
                                <input type="text" placeholder="" name="equipment_name" id="equipment_name">
                                <p class="error equipment_name_error" style="display: none;">Please describe the
                                    equipment you are purchasing.</p>
                                <input type="submit" value="Calculate" class="button"/>
                            </div>
                        </div><!-- end step 2 -->

                    </form>
                </div><!-- end wrapper -->
            </div><!-- end eq-loan-form-wrap -->
        </section>
    </main>

<?php $this->loadModule ('Footer'); ?>