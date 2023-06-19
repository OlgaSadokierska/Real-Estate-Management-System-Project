
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">

<body>
    <div id="main">
        <div class="text-center" id="info">
            <img id="ventaspro-logo" src="../img/logo_transparent_prostokat.png" width="200">
            <h3 class="text-center">Zarejestruj się!</h3>
            <form method="POST" action="rejestr.php" class="text-start" id="form-login">
                <div class="mb-3">
                    <label class="form-label" id="lbl-imie" for="imie">Imię</label>
                    <input class="form-control" type="text" id="txt-imie" name="imie">
                </div>
                <div class="mb-3">
                    <label class="form-label" id="lbl-nazwisko" for="nazwisko">Nazwisko</label>
                    <input class="form-control" type="text" id="txt-nazwisko" name="nazwisko">
                </div>
                <div class="mb-3">
                    <label class="form-label" id="lbl-email" for="email">Email</label>
                    <input class="form-control" type="email"
										id="txt-email"
										name="email"
										placeholder="Email" >
                </div>
                <div class="mb-3">
                    <label class="form-label" id="lbl-login" for="telefon">Telefon</label>
                    <input class="form-control" type="text" id="txt-login" name="telefon" required>
                </div>
                
                <div class="center">
                    <input type="submit" class="btn btn-primary btn-submit" value="Zarejestruj">
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
</body>

</html>
