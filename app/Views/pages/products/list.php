<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card rounded-0">
    <div class="card-header">
        <div class="d-flex w-100 justify-content-between">
            <div class="col-auto">
                <div class="card-title h4 mb-0 fw-bolder">Lista de Productos</div>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('Main/product_add') ?>" class="btn btn btn-primary bg-gradient rounded-0"><i class="fa fa-plus-square"></i> Agregar Productos</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-stripped table-bordered">
                <colgroup>
                    <col width="5%">
                    <col width="10%">
                    <col width="15%">
                    <col width="40%">
                    <col width="20%">
                    <col width="10%">
                </colgroup>
                <thead>
                    <th class="p-1 text-center">#</th>
                    <th class="p-1 text-center">Código</th>
                    <th class="p-1 text-center">Producto</th>
                    <th class="p-1 text-center">Descripción</th>
                    <th class="p-1 text-center">Precio</th>
                    <th class="p-1 text-center">Acción</th>
                </thead>
                <tbody>
                    <?php foreach ($products as $row) : ?>
                        <tr>
                            <th class="p-1 text-center align-middle"><?= $row['id'] ?></th>
                            <td class="px-2 py-1 align-middle"><?= $row['code'] ?></td>
                            <td class="px-2 py-1 align-middle"><?= $row['name'] ?></td>
                            <td class="px-2 py-1 align-middle"><?= $row['description'] ?></td>
                            <td class="px-2 py-1 align-middle text-end"><?= number_format($row['price'], 2) ?></td>
                            <td class="px-2 py-1 align-middle text-center">
                                <a href="<?= base_url('Main/product_edit/' . $row['id']) ?>" class="mx-2 text-decoration-none text-primary"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url('Main/product_delete/' . $row['id']) ?>" class="mx-2 text-decoration-none text-danger" onclick="if(confirm('Deseas eliminar <?= $row['code'] ?> - <?= $row['name'] ?> de la lista?') !== true) event.preventDefault()"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (count($products) <= 0) : ?>
                        <tr>
                            <td class="p-1 text-center" colspan="6">Sin resultados que mostrar</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
            <div>
                <?= $pager->makeLinks($page, $perPage, $total, 'custom_view') ?>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <h2><a href="https://www.configuroweb.com/46-aplicaciones-gratuitas-en-php-python-y-javascript/#Aplicaciones-gratuitas-en-PHP,-Python-y-Javascript" style="color: white; text-decoration:none;">Para más desarrollos ConfiguroWeb</a></h2>
</div>
<?= $this->endSection() ?>