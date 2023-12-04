<?php 
/**
 * 	Model Comment
 *  Sur ce modèle, nous traiterons toutes les requêtes liées aux commentaires
 */
function addComment($userId, $articleId, $content, $stars)
{
	global $conn;
	// Préparer la requête d'insertion
	$stmt = $conn->prepare("INSERT INTO comments (user_id, article_id, content, stars) VALUES (:user_id, :article_id, :content, :stars)");

	// Liaison des paramètres
	$stmt->bindParam(':user_id', $userId);
	$stmt->bindParam(':article_id', $articleId);
	$stmt->bindParam(':content', $content);
	$stmt->bindParam(':stars', $stars);

	// Exécution de la requête
	$stmt->execute();
	return true; // Retourne vrai si l'insertion a réussi
 }

function deleteComment($commentId)
{
	// Supprimer un commentaire en fonction de son id
	global $conn;
	$stmt = $conn->prepare("DELETE FROM comments WHERE id = :comment_id");

	// Liaison des paramètres
	$stmt->bindParam(':comment_id', $commentId);

	// Exécution de la requête
	$stmt->execute();
	return true; 
}
function getComment($id)
{
	global $conn;
	$stmt = $conn->prepare("SELECT * FROM comments WHERE id = :id");
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	return $stmt->fetch(PDO::FETCH_ASSOC);
}
