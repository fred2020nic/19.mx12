<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card rounded-0">
    <div class="card-header">
        <div class="d-flex w-100 justify-content-between">
            <div class="col-auto">
                <div class="card-title h4 mb-0 fw-bolder">Agregar Nueva Empresa</div>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('Main/products') ?>" class="btn btn btn-light bg-gradient border rounded-0"><i class="fa fa-angle-left"></i> Volver</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form action="<?= base_url('Main/empresa_add') ?>" method="POST">
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="code" class="control-label">Nombre Comercial</label>
                            <input type="text" class="form-control rounded-0" id="nombre" name="nombre" autofocus value="<?= !empty($request->getPost('nombre')) ? $request->getPost('nombre') : '' ?>" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="code" class="control-label">Razon Social</label>
                            <input type="text" class="form-control rounded-0" id="razon" name="razon" autofocus value="<?= !empty($request->getPost('razon')) ? $request->getPost('razon') : '' ?>" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="control-label">Calle</label>
                            <input type="text" class="form-control rounded-0" id="calle" name="calle" value="<?= !empty($request->getPost('calle')) ? $request->getPost('calle') : '' ?>" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="control-label">Municipio</label>
                            <input type="text" class="form-control rounded-0" id="municipio" name="municipio" value="<?= !empty($request->getPost('municipio')) ? $request->getPost('municipio') : '' ?>" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="control-label">Telefono</label>
                            <input type="number" class="form-control rounded-0 text-end" id="telefono" name="telefono" value="<?= !empty($request->getPost('telefono')) ? $request->getPost('telefono') : '' ?>" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="control-label">Regimen</label>
                            <input type="text" class="form-control rounded-0 text-end" id="regimen" name="regimen" value="<?= !empty($request->getPost('regimen')) ? $request->getPost('regimen') : '' ?>" required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="code" class="control-label">RFC</label>
                            <input type="text" class="form-control rounded-0" id="rfc" name="rfc" autofocus value="<?= !empty($request->getPost('rfc')) ? $request->getPost('rfc') : '' ?>" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="code" class="control-label">Colonia</label>
                            <input type="text" class="form-control rounded-0" id="colonia" name="colonia" autofocus value="<?= !empty($request->getPost('colonia')) ? $request->getPost('colonia') : '' ?>" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="control-label">Estado</label>
                            <input type="text" class="form-control rounded-0" id="estado" name="estado" value="<?= !empty($request->getPost('estado')) ? $request->getPost('estado') : '' ?>" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="control-label">Serie</label>
                            <input type="text" class="form-control rounded-0" id="serie" name="serie" value="<?= !empty($request->getPost('serie')) ? $request->getPost('serie') : '' ?>" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="control-label">Sucursal</label>
                            <input type="text" step="any" class="form-control rounded-0 text-end" id="sucursal" name="sucursal" value="<?= !empty($request->getPost('sucursal')) ? $request->getPost('sucursal') : '' ?>" required="required">
                        </div>
                        <div class="d-grid gap-1">
                            <button class="btn rounded-0 btn-primary bg-gradient">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="footer">
    <h2><a href="https://www.configuroweb.com/46-aplicaciones-gratuitas-en-php-python-y-javascript/#Aplicaciones-gratuitas-en-PHP,-Python-y-Javascript" style="color: white; text-decoration:none;">Para más desarrollos ConfiguroWeb</a></h2>
</div>
<?= $this->endSection() ?>