<?php

// Loading classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');


function listPosts()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}
function post()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}
function addComment($postId, $author, $comment)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if($affectedLines === false)
    {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else
    {
        header('Location: index.php?action=post&id=' .$postId);
    }
}
function comment()
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $comment = $commentManager->getComment($_GET['id']);
    require('view/frontend/CommentView.php');
}
function updateComment($commentId, $author, $comment, $postId)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $updateLine = $commentManager->updateComment($commentId, $author, $comment);

    if($updateLine === false)
    {
        throw new Exception('Impossible de mettre à jour le commentaire !');
    }
    else
    {
        header('Location: index.php?action=post&id=' .$postId);
    }
}