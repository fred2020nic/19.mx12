<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card rounded-0">
    <div class="card-header">
        <div class="d-flex w-100 justify-content-between">
            <div class="col-auto">
                <div class="card-title h4 mb-0 fw-bolder">Actualizar información de Producto</div>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('Main/products') ?>" class="btn btn btn-light bg-gradient border rounded-0"><i class="fa fa-angle-left"></i> Volver</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form action="<?= base_url('Main/product_edit/' . (isset($product['id']) ? $product['id'] : '')) ?>" method="POST">
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
                    <label for="code" class="control-label">Código</label>
                    <input type="text" class="form-control rounded-0" id="code" name="code" autofocus placeholder="Código Producto" value="<?= !empty($product['code']) ? $product['code'] : '' ?>" required="required">
                </div>
                <div class="mb-3">
                    <label for="code" class="control-label">Código de Barras</label>
                    <input type="text" class="form-control rounded-0" id="barras" name="barras" autofocus placeholder="Código de Barras" value="<?= !empty($product['barras']) ? $product['barras'] : '' ?>" required="required">
                </div>
                <div class="mb-3">
                    <label for="name" class="control-label">Nombre</label>
                    <input type="text" class="form-control rounded-0" id="name" name="name" autofocus placeholder="Nombre Producto" value="<?= !empty($product['name']) ? $product['name'] : '' ?>" required="required">
                </div>
                <div class="mb-3">
                    <label for="description" class="control-label">Descripción</label>
                    <textarea rows="3" class="form-control rounded-0" id="description" name="description" autofocus placeholder="(información opcional)" value=""><?= !empty($product['description']) ? $product['description'] : '' ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="control-label">Existencias</label>
                    <input type="number" step="any" class="form-control rounded-0 text-end" id="cantidad" name="cantidad" value="<?= !empty($request->getPost('cantidad')) ? $request->getPost('cantidad') : '' ?>" required="required">
                </div>
                <div class="mb-3">
                    <label for="price" class="control-label">Precio</label>
                    <input type="number" step="any" class="form-control rounded-0" id="price" name="price" autofocus placeholder="Precio del Producto" value="<?= !empty($product['price']) ? $product['price'] : '' ?>" required="required">

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