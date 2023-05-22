<?php $this->loadModule('Header'); ?>
 
    <div class="wrapper clear">
         
        <!-- POST -->
        <main class="main single-post col66" role="main">
            <section class="resources-articles">
                <article class="text-on-white">
                  <h1><?php echo $resourceArticle['title']; ?></h1>
                  <?php if ($resourceArticle['image'] != '') { ?>
                      <img src="<?php echo RESOURCE_ARTICLE_IMAGE_FOLDER . $resourceArticle['image']; ?>" />
                  <?php } ?>
                    <?php echo $resourceArticle['main_content']; ?>
                </article>
                <div class="addthis_sharing_toolbox"></div>
            </section>
            <section class="clear post-navigation">
                <?php if ($previousArticle) { ?>
                    <a href="/article/<?php echo $previousArticle['id']; ?>" class="left prev-post">Previous</a>
                <?php } ?>
                <?php if ($nextArticle) { ?>
                    <a href="/article/<?php echo $nextArticle['id']; ?>" class="right next-post">Next</a>
                <?php } ?>
            </section>
        </main>
 
        <!-- SIDEBAR -->
        <aside class="sidebar col33">
            <h2>Recent Articles</h2>
                <?php foreach ($recentArticles as $article) { ?>
                    <article>
                        <h3><a href="/article/<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></h3>
                        <p class="snippet">
                            <?php echo substr(strip_tags($article['main_content']), 0, 100) . '...'; ?>
                        </p>
                    </article>
                <?php } ?>
        </aside>
 
    </div><!-- end wrapper -->
 
<?php $this->loadModule('Footer'); ?>