<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card rounded-0">
    <div class="card-header">
        <div class="d-flex w-100 justify-content-between">
            <div class="col-auto">
                <div class="card-title h4 mb-0 fw-bolder">Lista de Transacciones</div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-stripped table-bordered">
                <colgroup>
                    <col width="5%">
                    <col width="15%">
                    <col width="15%">
                    <col width="25%">
                    <col width="10%">
                    <col width="20%">
                    <col width="10%">
                </colgroup>
                <thead>
                    <th class="p-1 text-center">#</th>
                    <th class="p-1 text-center">Fecha/Hora</th>
                    <th class="p-1 text-center">Código</th>
                    <th class="p-1 text-center">Cliente</th>
                    <th class="p-1 text-center"># Productos</th>
                    <th class="p-1 text-center">Monto Total</th>
                    <th class="p-1 text-center">Acción</th>
                </thead>
                <tbody>
                    <?php foreach ($transactions as $row) : ?>
                        <tr>
                            <th class="p-1 text-center align-middle"><?= $row['id'] ?></th>
                            <td class="px-2 py-1 align-middle"><?= date("Y-m-d h:i A", strtotime($row['created_at'])) ?></td>
                            <td class="px-2 py-1 align-middle"><?= $row['code'] ?></td>
                            <td class="px-2 py-1 align-middle"><?= $row['customer'] ?></td>
                            <td class="px-2 py-1 align-middle text-end"><?= number_format($row['total_items']) ?></td>
                            <td class="px-2 py-1 align-middle text-end"><?= number_format($row['total_amount'], 2) ?></td>
                            <td class="px-2 py-1 align-middle text-center">
                                <a href="<?= base_url('Main/transaction_view/' . $row['id']) ?>" class="mx-2 text-decoration-none text-dark"><i class="fa fa-eye"></i></a>
                                <a href="<?= base_url('Main/transaction_delete/' . $row['id']) ?>" class="mx-2 text-decoration-none text-danger" onclick="if(confirm('Deseas eliminar <?= $row['code'] ?> de la lista?') !== true) event.preventDefault()"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (count($transactions) <= 0) : ?>
                        <tr>
                            <td class="p-1 text-center" colspan="7">Sin resultados que mostrar</td>
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