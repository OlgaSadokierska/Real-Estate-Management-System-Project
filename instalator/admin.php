<h1>Instalator :: <code>krok: 4</code></h1>
<hr>
<form METHOD="post" action="<?php echo substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '?')).'?step=6' ?>">
    <div class="form-floating mb-3">
        <input class="form-control" name="name" id="name" type="text" placeholder="Nazwa" required>
        <label for="name">Nazwa serwisu</label>
    </div>
    <hr>
    <h4>Konto administratora</h4>
    <div class="form-floating mb-3">
        <input class="form-control" name="login" id="login" type="login" placeholder="login" required>
        <label for="login">Login</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" name="password" id="password" type="password" placeholder="Hasło" required>
        <label for="password">Hasło</label>
    </div>
    <div class="d-grid">
        <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Dalej</button>
    </div>
</form>
