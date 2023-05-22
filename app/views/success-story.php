<?php $this->loadModule('Header'); ?>

	<div class="banner success-stories-banner" style="background-image: url('/img/success-stories-banner.jpg');">
        <img src="/img/photo-overlay-horizontal-top-left.png" class="photo-overlay-left">
        <div class="wrapper">
            <div class="banner-text">
                <h2><?php //echo $page["Content"]["headline"]; ?>Success Stories</h2>
                <p><?php //echo $page["Content"]["statement"]; ?>Why 82% of our clients return for more funding.</p>
            </div>
        </div><!-- end wrapper -->
    </div>

    <main class="main about-us" role="main">

        <section class="text-on-white success-story">
            <div class="wrapper clear">
                <?php if ($successStory['image'] != '') { ?>
                    <img src="<?php echo ContentModel::getImageFolder('800x450') . $successStory['image']; ?>" class="left case-study-main-photo" alt="<?php echo $successStory['name']; ?>, <?php echo $successStory['company']; ?>" />
                <?php } ?>
                <h2 class="success-story-title"><?php echo $successStory['name']; ?>, <?php echo $successStory['company']; ?></h2>
                
                <?php echo $successStory['story']; ?>
            
            </div>
        </section>

        <section class="more-success-stories">
            <div class="wrapper">
                <ul class="success-stories-list success-stories-carousel">
                    <?php foreach ($successStories as $successStory) { ?>
                        <li>
                            <a href="/success-story/<?php echo $successStory['id'];?>">
                                <?php if ($successStory['image'] != '') { ?>
                                    <img src="<?php echo ContentModel::getImageFolder('800x450') . $successStory['image']; ?>" class="client-photo" alt="<?php echo $successStory['name']; ?> | <?php echo $successStory['company']; ?>" />
                                <?php } ?>
                                <div class="client-info">
                                    <span class="client-name"><?php echo $successStory['name']; ?></span>
                                    <span class="client-company"><?php echo $successStory['company']; ?></span>
                                </div>
                                <div class="loan-info working-capital">
                                    <img src="<?php echo $loanImages[$successStory['loan_type']]; ?>" class="loan-icon" />
                                    <span class="loan-type"><?php echo $loanTitles[$successStory['loan_type']]; ?></span>
                                    <span class="learn-more-link">Read Story</span>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </section>

    </main>


<?php $this->loadModule('Footer'); ?>