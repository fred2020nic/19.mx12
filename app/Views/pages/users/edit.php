<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card rounded-0">
    <div class="card-header">
        <div class="d-flex w-100 justify-content-between">
            <div class="col-auto">
                <div class="card-title h4 mb-0 fw-bolder">Actualizar Información de Usuarios</div>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('Main/users') ?>" class="btn btn btn-light bg-gradient border rounded-0"><i class="fa fa-angle-left"></i> Volver</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form action="<?= base_url('Main/user_edit/' . (isset($user['id']) ? $user['id'] : '')) ?>" method="POST">
                <?php if ($session->getFlashdata('error')) : ?>
                    <div class="alert alert-danger rounded-0">
                        <?= $session->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <?php if ($session->getFlashdata('success')) : ?>
                    <div class="alert alert-success rounded-0">
                        <?= $session->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="email" class="control-label">Nombre</label>
                    <div class="input-group rounded-0">
                        <input type="text" class="form-control rounded-0" id="name" name="name" autofocus placeholder="Nombre" value="<?= !empty($user['name']) ? $user['name'] : '' ?>" required="required">
                        <div class="input-group-text bg-light bg-gradient rounded-0"><i class="fa fa-user"></i></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="control-label">Correo</label>
                    <div class="input-group rounded-0">
                        <input type="email" class="form-control rounded-0" id="email" name="email" placeholder="correo electrónico" value="<?= !empty($user['email']) ? $user['email'] : '' ?>" required="required">
                        <div class="input-group-text bg-light bg-gradient rounded-0"><i class="fa fa-at"></i></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="control-label">Nueva Contraseña</label>
                    <div class="input-group rounded-0">
                        <input type="password" class="form-control rounded-0" id="password" name="password" placeholder="**********">
                        <div class="input-group-text bg-light bg-gradient rounded-0"><i class="fa fa-key"></i></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="control-label">Confirmar Nueva Contraseña</label>
                    <div class="input-group rounded-0">
                        <input type="password" class="form-control rounded-0" id="cpassword" name="cpassword" placeholder="**********">
                        <div class="input-group-text bg-light bg-gradient rounded-0"><i class="fa fa-key"></i></div>
                    </div>
                </div>
                <div class="d-grid gap-1">
                    <button class="btn rounded-0 btn-primary bg-gradient">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="footer">
    <h2><a href="https://www.configuroweb.com/46-aplicaciones-gratuitas-en-php-python-y-javascript/#Aplicaciones-gratuitas-en-PHP,-Python-y-Javascript" style="color: white; text-decoration:none;">Para más desarrollos ConfiguroWeb</a></h2>
</div>
<?= $this->endSection() ?>