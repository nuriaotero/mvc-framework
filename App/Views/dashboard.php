<!DOCTYPE html>
<html>
<head>
    <title>Mi Agenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-danger">Hola <?= htmlspecialchars($user->name) ?> 💖</h4>
        <a href="<?= BASE_URL ?>/logout" class="btn btn-outline-warning">Salir</a>
    </div>

    <!-- NUEVO CONTACTO -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-danger text-white fw-bold">Nuevo contacto</div>
        <div class="card-body">
            <form method="post" action="<?= BASE_URL ?>/contact/store" class="row g-3">
                <div class="col-12 col-md-6">
                    <input name="name" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="col-12 col-md-6">
                    <input name="lastname" class="form-control" placeholder="Apellidos" required>
                </div>
                <div class="col-12 col-md-4">
                    <input name="phone" class="form-control" placeholder="Teléfono">
                </div>
                <div class="col-12 col-md-4">
                    <input name="email" class="form-control" placeholder="Email">
                </div>
                <div class="col-12 col-md-4">
                    <input name="address" class="form-control" placeholder="Dirección">
                </div>
                <div class="col-12">
                    <button class="btn btn-warning w-100">Guardar contacto</button>
                </div>
            </form>
        </div>
    </div>

    <!-- LISTA CONTACTOS -->
    <h5 class="text-danger mb-2">Tus contactos</h5>

    <ul class="list-group">
        <?php foreach ($contacts as $c): ?>
        <li class="list-group-item">
            <form method="post" action="<?= BASE_URL ?>/contact/update" class="row g-2 align-items-center">
                <input type="hidden" name="id" value="<?= $c->id ?>">

                <div class="col-12 col-md-2">
                    <input name="name" value="<?= htmlspecialchars($c->name) ?>" class="form-control form-control-sm" required>
                </div>
                <div class="col-12 col-md-2">
                    <input name="lastname" value="<?= htmlspecialchars($c->lastname) ?>" class="form-control form-control-sm" required>
                </div>
                <div class="col-12 col-md-2">
                    <input name="phone" value="<?= htmlspecialchars($c->phone) ?>" class="form-control form-control-sm">
                </div>
                <div class="col-12 col-md-3">
                    <input name="email" value="<?= htmlspecialchars($c->email) ?>" class="form-control form-control-sm">
                </div>
                <div class="col-12 col-md-3">
                    <input name="address" value="<?= htmlspecialchars($c->address) ?>" class="form-control form-control-sm">
                </div>

                <div class="col-12 d-flex gap-2 mt-2">
                    <button class="btn btn-sm btn-warning">💾 Guardar</button>
                    <a href="<?= BASE_URL ?>/contact/delete/<?= $c->id ?>" class="btn btn-sm btn-outline-danger">❌ Borrar</a>
                </div>
            </form>
        </li>
        <?php endforeach; ?>
    </ul>

</div>

</body>
</html>
