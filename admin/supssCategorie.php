<?php session_start();

//insertion du module de connexion
include 'include/connexion.php';

if(!isset($_SESSION['admin']))
{
    header('location: index.php');
}
else 
{
    $safe = strip_tags($_GET['id']); //mr propre
    $rqCat = "DELETE FROM scategories WHERE idSCategorie = :idSCategorie";
    $stmtCat = $dbh->prepare($rqCat);
    $paramCat = array(':idSCategorie' => $safe);
    if($stmtCat ->execute($paramCat))
    {
        header('location: admin.php');
    } else 
    {
        //insertion du module de connexion
        include 'include/header.php';
        echo '<p class="alert alert-danger">Erreur lors de la supression de la sous-categorie</p>';
        // insertion du footer
        include 'include/footer.php';
    }
}