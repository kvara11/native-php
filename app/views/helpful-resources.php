<?php $this->loadModule('Header'); ?>

    <div class="color-banner">
        <div class="wrapper">
            <div class="center">
                <h1><?php echo $page["Content"]["headline"]; ?></h1>
                <p><?php echo $page["Content"]["main_content"]; ?></p>
            </div>
        </div><!-- end wrapper -->
    </div>

    <main class="main resources" role="main">
        <section class="resources-articles">
            <div class="wrapper clear">
                <?php foreach ($resourceArticles as $article) { ?>
                    <article class="text-on-white col33">
                        <h3><a href="/article/<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></h3>
                        <?php if ($article['image'] != '') { ?>

                            <a href="/article/<?php echo $article['id']; ?>">
                                <img src="<?php echo RESOURCE_ARTICLE_IMAGE_FOLDER . $article['image']; ?>" />
                            </a>

                        <?php } ?>
                        <p class="snippet"><?php echo substr(strip_tags($article['main_content']), 0, 140) . '...'; ?></p>
                        <a href="/article/<?php echo $article['id']; ?>" class="read-more-link">Read more</a>
                    </article>    
                <?php } ?>
            </div>
        </section>
    </main>

<?php $this->loadModule('Footer'); ?>