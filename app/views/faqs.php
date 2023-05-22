<?php $this->loadModule('Header'); ?>

    <div class="color-banner">
        <div class="wrapper">
            <div class="center">
                <h1><?php echo $page["Content"]["headline"]; ?></h1>
                <p><?php echo $page["Content"]["statement"]; ?></p>
            </div>
        </div><!-- end wrapper -->
    </div>

    <main class="main faqs" role="main">


        <section>
            <div class="clear wrapper">
                <div class="col25 faq-toggles">
                    <a href="#" class="general-toggle selected">General FAQs</a>
                    <a href="#" class="working-capital-toggle">Working Capital FAQs</a>
                    <a href="#" class="equipment-loans-toggle">Equipment Loans FAQs</a>
                    <a href="#" class="offer-financing-toggle">Offer Financing FAQs</a>
                </div>

                <div class="text-on-white col75 faq-content">
                    
                    <ul class="general-faqs">
                        <?php 
                            if ($general) {
                                foreach ($general as $key => $faq) {
                        ?>
                                    <li>
                                        <h3 class="toggle-btn faq-question"><?php echo $faq['question']; ?></h3>
                                        <div class="toggle-content faq-answer"><p><?php echo $faq['answer']; ?></p></div>
                                    </li>
                        <?php 
                                }
                            }
                        ?>
                    </ul>

                    <ul class="working-capital-faqs">
                        <?php 
                            if ($workingCapital) {
                                foreach ($workingCapital as $key => $faq) {
                        ?>
                                    <li>
                                        <h3 class="toggle-btn faq-question"><?php echo $faq['question']; ?></h3>
                                        <div class="toggle-content faq-answer"><p><?php echo $faq['answer']; ?></p></div>
                                    </li>
                        <?php 
                                }
                            }
                        ?>
                    </ul>
                    
                    <ul class="equipment-loans-faqs">
                        <?php 
                            if ($equipmentLoans) {
                                foreach ($equipmentLoans as $key => $faq) {
                        ?>
                                    <li>
                                        <h3 class="toggle-btn faq-question"><?php echo $faq['question']; ?></h3>
                                        <div class="toggle-content faq-answer"><p><?php echo $faq['answer']; ?></p></div>
                                    </li>
                        <?php 
                                }
                            }
                        ?>
                    </ul>

                    <ul class="offer-financing-faqs">
                        <?php 
                            if ($offerFinancing) {
                                foreach ($offerFinancing as $key => $faq) {
                        ?>
                                    <li>
                                        <h3 class="toggle-btn faq-question"><?php echo $faq['question']; ?></h3>
                                        <div class="toggle-content faq-answer"><p><?php echo $faq['answer']; ?></p></div>
                                    </li>
                        <?php 
                                }
                            }
                        ?>
                    </ul>

                </div><!-- end faq-content -->
            </div><!-- end wrapper -->
        </section>

    </main>

<?php $this->loadModule('Footer'); ?>