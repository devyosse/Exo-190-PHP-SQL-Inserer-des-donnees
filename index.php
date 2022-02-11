<?php

/**
 * Pour cet exercice, vous allez utiliser la base de données table_test_php créée pendant l'exo 189
 * Vous utiliserez également les deux tables que vous aviez créées au point 2 ( créer des tables avec PHP )
 */

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'table_test_phpmyadmin';


try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */

    $pdo = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */

    // TODO votre code ici.

    $sql ="
        INSERT INTO utilisateur (nom, prenom, mail, password, adresse, code_postal, pays)
        VALUES ('Doe', 'John', 'Doejohn@gmail.com', 'azerty', 'Arlette Corlette', 59610, 'France')
    ";
    $result = $pdo->exec($sql);

    echo $result;


    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    // TODO votre code ici.

    $sql2 ="
        INSERT INTO produit (titre, prix, description_courte, description_longue)
        VALUE ('newproduct', 10, 'Une description de mon produit', 'description longue')
    ";
    $result2 = $pdo->exec($sql2);

    echo $result2;
    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    // TODO Votre code ici.
    $sql3 ="
        INSERT INTO utilisateur (nom, prenom, mail, password, adresse, code_postal, pays)
        VALUES ('Super', 'Man', 'Superman@gmail.com', 'azerty', 'Gambetta', 59610, 'France'),
               ('Iron', 'Man', 'Ironman@gmail.com', 'azerty', 'charle degaulle', 70300, 'France')
    ";
    $result3  = $pdo->exec($sql3);

    echo $result3;
    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    // TODO Votre code ici.
    $sql3 ="
        INSERT INTO produit (titre, prix, description_courte, description_longue)
        VALUES ('Pomme', 2, 'Voici une pomme tout droit issus de nos campagne', 'La pomme de notre région est de retour chez vous avec une saveur plus rafinée et goûtue'),
               ('Poir', 2, 'Voici une poire tout droit issus de nos campagne', 'La poire de notre région est de retour chez vous avec une saveur plus rafinée')
               ";
    $result3  = $pdo->exec($sql3);

    echo $result3;
    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    // TODO Votre code ici.
    $pdo->beginTransaction();

    $insert = 'INSERT INTO utilisateur (nom, prenom, mail, password, adresse, code_postal, pays) VALUES ';


    $sql5 = $insert . "('Connor', 'Sarah', 'Saraconnor@gmail.com', 'azerty', 'rue Jules Guesdes', 20000, 'Etats-Unis')";
    $pdo->exec($sql5);

    $sql6 = $insert . "('Dane', 'Jane', 'Danejane@gmail.com', 'azerty', 'rue charleroi', 13098, 'Belgique')";
    $pdo->exec($sql6);

    $sql7 = $insert . "('Jack', 'ouille', 'Jackouille@gmail.com', 'azerty', 'rue aldente', 4500, 'AUstralie')";
    $pdo->exec($sql7);

    $pdo->commit();
    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */
}
catch (PDOException $e){
    echo "une erreur est survenue: " . $e->getMessage() . "<br>";

}