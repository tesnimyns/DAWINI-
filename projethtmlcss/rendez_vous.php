<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs des champs du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $Numero = $_POST['Numero'];
   
    $dispo = $_POST['dispo'];
    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'form');
    // Vérifier la connexion
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        // Préparer la requête d'insertion
        $stmt = $conn->prepare("INSERT INTO regi (nom, prenom, gender, email, Numero, dispo) VALUES (?, ?, ?, ?, ?, ?)");
        // Vérifier si la préparation a réussi
        if ($stmt) {
            // Lier les valeurs aux paramètres de la requête
            $stmt->bind_param("ssssis", $nom, $prenom, $gender, $email, $Numero, $dispo);
            // Exécuter la requête
            if ($stmt->execute()) {
                echo "Inscription réussie";
            } else {
                echo "Erreur lors de l'insertion: " . $conn->error;
            }
            // Fermer la déclaration
            $stmt->close();
        } else {
            echo "Erreur lors de la préparation de la requête: " . $conn->error;
        }
        // Fermer la connexion
        $conn->close();
    }
} else {
    // Afficher un message d'erreur si le formulaire n'a pas été soumis
    echo "Le formulaire n'a pas été soumis";
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reservez votre rendez_vous</title>
    <link rel="shortcut icon" href="./images/logo.png">
    <link rel="stylesheet" href="./rendez-vous.css">

    <script src="https://kit.fontawesome.com/a3fb9647c7.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Anta&family=Assistant&family=Caveat:wght@400..700&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <img src="./images/logo.png">
            <a href="./acceuilnew.html">DAWINI</a>

        </div>
        <div class="menu">
            <div class="menu-links">
                <a href="./acceuilnew.html">Acceuil</a>
                <a href="./Services.html">Services</a>
                <a href="./Dentistes.html">Dentistes</a>
                <a href="./about.html">About </a>

            </div>
            <div>
                <button class="rendez-vous">Rendez-vous</button>
            </div>
        </div>

    </nav>


    <div class="rdv reveal">
        <div class="titre">
            <h1 class="reveal-1" >Prendre RDV</h1>
            <p class="reveal-2">Vous pouvez prendre un RDV via notre site web, Pour cela veuillez remplir le formulaire ci-dessous et
                appuyer sur le bouton « Envoyer » .<br>Une confirmation vous sera adressée sous peu. <br>Merci .</p>
        </div>
        <div class="form reveal-3 ">

            <form action="index.php" method="post">
            <label for="name">Nom :</label>
            <input type="text" name="nom" id="name" placeholder="entrer votre nom" required>
            <br />
            <label for="prenom">Prenom :</label>
            <input type="text" name="prenom" id="prenom" placeholder="entrer votre prenom" required>


            <br>

            <input type="radio" name="gender" value="Homme" id="Homme">
            <label for="Homme">Homme</label>

            <input type="radio" name="gender" value="Femme" id="Femme">
            <label for="Femme" cheked="checked">Femme</label>

            <input type="radio" name="gender" value="Autre" id="Autre">
            <label for="Autre">Autre</label>


            <br>
            <label for="email">Email : </label>
            <input type="email" id="email" name="email" placeholder="exemple@gmail.com" required>

            <br>

            <label for="tel">Numero de telephone: </label>
            <input type="tel" name="Numero" id="tel" placeholder="97-345-234" pattern="[0-9]{8}" required>


            <br>

            <!-- <label for="dr">Choisir le docteur :</label>
            <select 
            id="dr" 
            name="dr"   
            onfocus="this.size=1;"
             onblur="this.size=0;"
              onchange="this.size=1;"
              >

                <option  value="DR1" selected>Dr Houssem Ghaffari</option>
                <option" value="DR2">Dr Asma Nouira</option>
                <option  value="DR3">Dr Mahmoud Baroudi</option>
                <option  value="DR4">Dr Arwa Hammouda</option>
                <option   value="DR5">Dr Laila Chelly</option>
                <option  value="DR6">Dr Ahmed Mrabet</option>
                <option  value="DR7">Dr Mahdi Ben Ammar</option>
                <option  value="DR8">Dr Fatma Bouaziz</option>
            </select> -->

            <br>
            <label for="date">Vos Disponibilités </label>
            <input type="date" name="dispo" id="date" placeholder="12/10/2020" required>



            <br>
            <br>



            <input type="submit" id="submit" value="submit">
        </form>

        </div>
    </div>


    <div class="contact-info reveal">
        <h2 class="reveal-1">Contact information</h2>
        <div class="Adr reveal-2">
            <i class="fa-solid fa-location-dot fa-bounce"></i></i>
            <div class="ad ">
                <h3>Adresse</h3>
                <p>5.Av de la liberté – Le passage Tunis-Tunisia</p>
            </div>
        </div>
        <div class="Adr reveal-3">
            <i class="fa-solid fa-phone fa-shake"></i>
            <div class="ad">
                <h3>Appelez-Nous</h3>
                <p>
                    Tel : +216 71 25 98 55
                    <br>
                    Fax : +216 71 33 48 76
                </p>
            </div>
        </div>
        <div class="Adr reveal-4">
            <i class="fa-solid fa-envelope fa-beat"></i>
            <div class="ad">
                <h3>Email</h3>
                <p> contact@dentistetunisie.com
                    <br>
                    cdentaire@gmail.com
                </p>
            </div>
        </div>
        <div class="social reveal">
            <div class="fb reveal-1">
                <a href="https://www.facebook.com" target="_blank"><i class="fa-brands fa-facebook-f fa-sm"></i></a>
            </div>
            <div class="linkdin reveal-2">
                <a href="https://www.linkedin.com" target="_blank"><i class="fa-brands fa-linkedin-in fa-sm"></i></a>
            </div>
            <div class="insta reveal-3">
                <a href="https://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram fa-sm"></i></a>
            </div>
        </div>
    </div>

    <!-- footer  -->
    <footer>
        <div class="contenu-footer reveal">

            <div class="bloc-footer-liens reveal-1">
                <h3>Liens Utiles</h3>
                <ul class="liste-liens">

                    <li><a href="./Acceuil.html">Acceuil</a></li>
                    <li><a href="./Services.html">Services</a></li>
                    <li><a href="./Acceuil.html">Dentistes</a></li>
                    <li><a href="./Acceuil.html">Urgence</a></li>
                </ul>
            </div>
            <div class="bloc-footer-contact reveal-2">
                <h3> Adresse</h3>
                <p><i class="fa-solid fa-phone"></i> +216 71 25 98 55</p>
                <p><i class="fa-solid fa-envelope"></i> cdentaire@gmail.com</p>
                <p> <i class="fa-solid fa-location-dot"></i> 5.Av de la liberté – Le passage Tunis</p>
            </div>

            <div class="bloc-footer-horaire reveal-3">
                <h3>Horaire</h3>
                <ul class="liste-horaire">
                    <li>Lun 10h-19h</li>
                    <li>Mar 10h-19h</li>
                    <li>Mer 10h-19h</li>
                    <li>Jeu 10h-19h</li>
                    <li>Ven 10h-19h</li>
                    <li>Sam 10h-14h</li>
                    <li>Dim fermé</li>
                </ul>
            </div>
            <div class="bloc-footer-sociaux reveal-4">
                <h3>Suivez-Nous</h3>
                <ul class="liste-sociaux">
                    <li><a href="https://www.facebook.com" target="_blank"><i class="fa-brands fa-facebook-f"></i>
                            Facebook</a></li>
                    <li><a href="https://www.twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i>
                            Twitter</a></li>
                    <li><a href="https://www.linkedin.com" target="_blank"><i class="fa-brands fa-linkedin-in"></i>
                            Linkedin</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <section id="copy-right">
        <div class="copy-right-sec"><i class="fa-solid fa-copyright"></i>
            Copyright © 2022 Tous droits réservés - Clinique Dentaire Tunisie


        </div>

    </section>
    <!-- fin footer  -->


<script src="./rendez_vous.js"></script>
</body>

</html>