<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Paramètres de connexion à la base de données
    $db_username = 'overcop_user';
    $db_password = 'Uqo08o_01';
    $db_name = 'ctf';
    $db_host = '79.137.38.217';

    // Se connecter à la base de données
    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name)
        or die('Could not connect to the database');

    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Préparer la requête SQL pour vérifier l'utilisateur
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);

    print("TEST1");
    if (mysqli_num_rows($result) == 1) {
        // Rediriger vers la page de recherche d'articles si la connexion réussie
        header("Location: search.html");
    } else {
        // Échec de l'authentification
        header("Location: index.html");
    }
    print("TEST2");
    // Fermer la connexion à la base de données
    mysqli_close($db);
}
?>
