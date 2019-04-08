<template>
    <header>
        <a href="index.php" class="titre">Nom du site</a>
        <div class="notmobile">
            <a href="pages/login/inscription.php" class="conn">Inscription</a>
            <a href="pages/login/connexion.php" class="conn">Connexion</a>
        </div>
        <div class="onlymobile dropdown">
            <button onclick="myFunction()" class="dropbtn makeitdrop">M</button>
            <div id="myDropdown" class="dropdown-content">
                <a href="index.php">Accueil</a>
                <a href="pages/listechap.php">Chapitres</a>
                <a href="pages/listemeth.php">Méthodes</a>
                <a href="pages/listeexos.php">Exercices</a>
                <a href="pages/login/inscription.php">Inscription</a>
                <a href="pages/login/connexion.php">Connexion</a>
            </div>
        </div> 
    </header>
</template>

<script>
    export default {
        mounted() {
            console.log('Header mounted.')
        }
    }
</script>
