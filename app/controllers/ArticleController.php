<?php

class ArticleController extends BaseController {

    protected $routes = array(
        '/:id' => array('action' => 'showArticle'),
    );

    public function showArticle($params) {

        $app = App::getInstance();
        $db = Database::getInstance();

        $article = $db->prepare("SELECT * FROM resource_articles WHERE id = :id");
        $article->execute(array(':id' => $params["id"]));
        $article = $article->fetch(PDO::FETCH_ASSOC);

        $recentArticles = $db->prepare("SELECT * FROM resource_articles WHERE active='1' ORDER BY id DESC LIMIT 2");
        $recentArticles->execute();
        $recentArticles = $recentArticles->fetchAll(PDO::FETCH_ASSOC);

        $previousArticle = $db->prepare("SELECT id FROM resource_articles WHERE id > :id and active='1' ORDER BY id ASC LIMIT 1");
        $previousArticle->execute(array(':id' => $params["id"]));
        $previousArticle = $previousArticle->fetch(PDO::FETCH_ASSOC);

        $nextArticle = $db->prepare("SELECT id FROM resource_articles WHERE id < :id and active='1' ORDER BY id DESC LIMIT 1");
        $nextArticle->execute(array(':id' => $params["id"]));
        $nextArticle = $nextArticle->fetch(PDO::FETCH_ASSOC);

        $meta = new Meta();
        $meta->setTitle($article['meta_title']);
        $meta->setDescription($article['meta_description']);
        $meta->setKeywords($article['meta_keywords']);
        $meta->setOGTitle($article['meta_title']);
        $meta->setOGSiteName($article['meta_title']);
        $meta->setOGDescription($article['meta_description']);
        $meta->setOGImage($article['image']);

        $app->template->set('page', $this->getPageSectionFields());
        $app->template->set('resourceArticle', $article);
        $app->template->set('recentArticles', $recentArticles);
        $app->template->set('previousArticle', $previousArticle);
        $app->template->set('nextArticle', $nextArticle);
        $app->template->setModuleVar('Header', 'meta', $meta);
        $app->template->render('article.php');

    }

}