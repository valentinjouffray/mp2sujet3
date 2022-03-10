<head>
    <title>Formation l'ULHN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>

<body>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="formations.php">Formation</a>
        <a href="litis.php">Litis</a>
        <a href="#">Stage</a>
        <a href="#">Profil</a>
    </div>

    <div id="main">
        <div class="navbar">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
            
            <button id="BtnConnexion" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><img src="https://img.icons8.com/material-sharp/24/000000/login-rounded-right.png"/>Connexion</button>
            <div id="id01" class="modal">
        
                <form class="modal-content animate" action="/action_page.php" method="post">

                <div class="container">
                    <label for=""><b>Email</b></label>
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <input type="text" placeholder="Entrer l'email" name="email" required>

                    <label for=""><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrer votre mot de passe" name="psw" required>
                        
                    <button type="submit">Connexion</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Rester connecté
                    </label>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">S'inscrire</button>
                    <span class="psw"><a href="#">Mot de passe oublié?</a></span>
                </div>
                </form>
            </div>
        </div>