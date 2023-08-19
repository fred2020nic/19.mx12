<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card rounded-0">
    <div class="card-header">
        <div class="d-flex w-100 justify-content-between">
            <div class="col-auto">
                <div class="card-title h4 mb-0 fw-bolder">Agregar Nuevo Movimiento</div>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('Main/products') ?>" class="btn btn btn-light bg-gradient border rounded-0"><i class="fa fa-angle-left"></i> Volver</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form action="" id="form" method="POST">
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
                    <div class="col-md-">
                        <div class="mb-3">
                            <label for="code" class="control-label">Tipo</label>
                            <select name="tipo" id="tipo" class="form-select rounded-0">
                                <option value="">Selecciona un tipo</option>
                                <option value="1">Entrada</option>
                                <option value="0">Salida</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="code" class="control-label">Codigo de Barras</label>
                            <input required type="text" class="form-control rounded-0" id="producto" name="producto" autofocus value="<?= !empty($request->getPost('producto')) ? $request->getPost('producto') : '' ?>" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="control-label">Cantidad</label>
                            <input type="text" class="form-control rounded-0" id="cantidad" name="cantidad" value="<?= !empty($request->getPost('cantidad')) ? $request->getPost('cantidad') : '' ?>" required="required">
                        </div>
                        <div class="d-grid gap-1">
                            <button class="btn rounded-0 btn-primary bg-gradient" id="guardar">Guardar</button>
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
<script>
    $("#guardar").click(function(e) {
        e.preventDefault();
        producto = $("#producto").val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('productos.php') ?>",
            data: {
                producto: producto
            },
            success: function(data) {
                if (data == 0) {
                    alert("Producto no encontrado");
                    $("#producto").val("");
                } else {
                    $("#producto").val(data);
                    var dataString = $("#form").serialize();
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('eys.php') ?>",
                        data: dataString,
                        success: function(data) {
                            if (data == 1) {
                                alert("Movimiento agregado correctamente");
                                location.reload();
                            } else {
                                console.log(data);
                            }
                        }
                    });
                }
            }
        });
    });
</script>
<?= $this->endSection() ?>