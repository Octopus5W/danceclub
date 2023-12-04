<?php
/**
 * 	Model Article
 *  Sur ce modèle, nous traiterons toutes les requêtes liées aux articles
 */
 
 function getAllArticles()
 {
     global $conn;
     $sql = $conn->query("
        SELECT articles.*, AVG(comments.stars) AS moyenne_notes
        FROM articles
        LEFT JOIN comments ON articles.id = comments.article_id
        GROUP BY articles.id
    ");
     return $sql->fetchAll(PDO::FETCH_ASSOC);
 }
 
 function getArticleById($articleId)
 {
    $article = (int)$articleId;
     // Retourner un article en fonction de son id
     global $conn;
     
     // récup l'articles avec les commentaires
        $sql = $conn->query("
        SELECT articles.*, AVG(comments.stars) AS moyenne_notes
        FROM articles
        LEFT JOIN comments ON articles.id = comments.article_id
        WHERE articles.id = '$article'
    ");
     return $sql->fetch(PDO::FETCH_ASSOC);
 }
 
 function getArticlesByUserId($userId)
 {
     // Retourner tous les articles d'un utilisateur en fonction de son id
     global $conn;
     $sql = $conn->query("SELECT * FROM articles WHERE user_id = '$userId' ");
     return $sql->fetchAll(PDO::FETCH_ASSOC);
 }
 
 function getCommentsForArticle($articleId)
 {
     // Retourner tous les commentaires d'un article en fonction de son id
     global $conn;
     $sql = $conn->query("
     SELECT comments.id AS comment_id, comments.user_id, comments.article_id, comments.content, comments.stars, comments.created_at,
            users.id AS user_id, users.username, users.email  -- Ajoutez d'autres colonnes utilisateur si nécessaire
     FROM comments
     INNER JOIN users ON comments.user_id = users.id
     WHERE article_id = '$articleId'
 ");
     return $sql->fetchAll(PDO::FETCH_ASSOC);
 }
 
 function addArticle($articleTitle, $articleDescription, $articleImage, $articleContent, $userId)
 {
     // retourne un message succés/erreur lors de l'ajout d'un article
     global $conn;
     $sql = $conn->query("INSERT INTO articles (title, description, content, image, user_id) VALUES ('$articleTitle', '$articleDescription', '$articleContent', '$articleImage', '$userId')");
     return $sql;
 }
 
 function deleteArticle($articleId, $userId)
 {
     // retourne un message succés/erreur lors de la suppression d'un article
     global $conn;
     $sql = $conn->query("DELETE FROM articles WHERE id = '$articleId' AND user_id = '$userId'");
     return $sql;
 }
 
 function updateArticle($articleId, $articleTitle, $articleDescription, $articleContent, $articleImage, $userId)
 {
     // retourne un message succés/erreur lors de la modification d'un article
     global $conn;
     $sql = $conn->query("UPDATE articles SET title = '$articleTitle', description = '$articleDescription', content = '$articleContent', image = '$articleImage'  WHERE id = '$articleId' AND user_id = '$userId'");
     return $sql;
 }