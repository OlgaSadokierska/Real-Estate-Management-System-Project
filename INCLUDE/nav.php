<header>
    <a href="./index.php"><img class="logo" src="./img/logo_transparent_prostokat.png"></a>
    <nav>
        <ul class="nav-links">
            <li><a href="o-nas.php">O nas</a></li>
			<li><a href="oferta.php">Oferty</a></li>						
			<li><a href="kontakt.php">Kontakt</a></li>							
        </ul>
    </nav>
    <?php
    session_start();
    if (isset($_SESSION["loggedin"]) && ($_SESSION["loggedin"] == TRUE) &&  ($_SESSION["log"]['typ_konta'] == 'AD')){
        ?>
        <div>  
        <a href="./cms.php"><img src="./img/cms.png" style="width:25px; margin-right: 10px;"></a>
        <a href="./logout.php"><button>Wyloguj się</button></a>
        </div>
        <?php
    }elseif((isset($_SESSION["loggedin"]) && ($_SESSION["loggedin"] == TRUE) &&  ($_SESSION["log"]['typ_konta'] == 'KL'))){
        ?>
        <div>  
        <a href="./rezerwacje.php"><img src="./img/shopping-cart.png" style="width:25px; margin-right: 10px;"></a>
        <a href="./konto.php"><img src="./img/user.png" style="width:25px; margin-right: 10px;"></a>
        <a href="./logout.php"><button>Wyloguj się</button></a>
        </div>
        <?php
    } 
    else {
        ?>
        <div>  
        <a href="./logowanie/stronalogowania.php"><button>Zaloguj się</button></a>
        </div>
        <?php
    } ?>
    <!--res-->
    <button class="burger" onclick=>
    </button>
</header>