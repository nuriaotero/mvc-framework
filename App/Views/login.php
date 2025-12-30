<!DOCTYPE html>
<html>
<head>
    <title>Agenda Eloquent - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card mx-auto shadow" style="max-width:400px">
        <div class="card-body">
            <h4 class="text-center text-danger mb-3">Mi Agenda 💖</h4>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form method="post">
                <input class="form-control mb-2" name="email" placeholder="Email" required>
                <input type="password" class="form-control mb-3" name="password" placeholder="Contraseña" required>
                <button class="btn btn-danger w-100">Entrar</button>
            </form>

            <div class="text-center mt-3">
                <a href="<?= BASE_URL ?>/register" class="text-warning">Registrarse</a>

            </div>
        </div>
    </div>
</div>

</body>
</html>
