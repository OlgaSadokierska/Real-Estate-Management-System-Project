
    <link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
			crossorigin="anonymous"
		/>
    <link rel="stylesheet" href="./style.css">
<style type="text/css" id="operaUserStyle"></style><style type="text/css"></style></head>

<body>
    <div id="main">
        <div class="text-center" id="info"><img id="ventaspro-logo" src="../img/logo_transparent_prostokat.png" width="200">
            <h3 class="text-center">Zarejestruj się!</h3>
            <form method="POST" action="login.php" class="text-start" id="form-login">
            <div class="mb-3"><label class="form-label" id="lbl-usuario" for="imie">Imie</label><input class="form-control" type="text" id="txt-usuario" name="imie"></div>
            <div class="mb-3"><label class="form-label" id="lbl-usuario" for="nazwisko">Nazwisko</label><input class="form-control" type="text" id="txt-usuario" name="nazwisko"></div>
            <div class="mb-3"><label class="form-label" id="lbl-usuario" for="email">Email</label><input class="form-control" type="text" id="txt-usuario" name="email"></div>
                <div class="mb-3"><label class="form-label" id="lbl-usuario" for="login">Login</label><input class="form-control" type="text" id="txt-usuario" name="login" required></div>
                <div class="mb-3"><label class="form-label" id="lbl-password" for="haslo">Hasło</label><input class="form-control" type="password" id="txt-password"name="haslo" required></div>
                <div class="center">
                <input type="submit" class="btn btn-primary btn-submit" value="Zaloguj">
                </div>
                <div class="rejestruj">
                <p>Posiadasz już konto?</p><a href="..">Zaloguj się!</a>
                </div>
            </form>
            
        </div>
    </div>
    <script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
			crossorigin="anonymous"
		></script>
    <script id="bs-live-reload" data-sseport="51751" data-lastchange="1684785110658" src="/js/livereload.js"></script>
</body></html>



