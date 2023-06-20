
<h1>Instalator :: <code>krok: 1</code></h1>
<hr>
<form METHOD="post" action="<?php echo $_SERVER['REQUEST_URI'].'?step=2' ?>">
    <div class="form-floating mb-3">
        <input class="form-control" name="host" id="host" type="text" placeholder="Nazwa" required>
        <label for="host">Nazwa lub adres serwera</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" name="dbname" id="dbname" type="text" placeholder="Nazwa" required>
        <label for="dbname">Nazwa bazy danych</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" name="user" id="user" type="text" placeholder="Nazwa" required>
        <label for="user">Nazwa użytkownika</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" name="passwd" id="passwd" type="password" placeholder="Nazwa" required>
        <label for="passwd">Hasło</label>
    </div>
    <div class="d-grid">
        <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Dalej</button>
    </div>
</form>
