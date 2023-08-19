<?= $this->extend('layouts/main') ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pos";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT m.*,p.name FROM movimientos m INNER JOIN products p ON m.producto = p.id;";
$result = mysqli_query($conn, $query);

$productos = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productos[] = $row;
    }
}
?>
<?= $this->section('content') ?>
<div class="card rounded-0">
    <div class="card-header">
        <div class="d-flex w-100 justify-content-between">
            <div class="col-auto">
                <div class="card-title h4 mb-0 fw-bolder">Entradas y Salidas</div>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('Main/eys_add') ?>" class="btn btn btn-primary bg-gradient border rounded-0"><i class="far fa-plus-square"></i> Crear Movimiento</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-stripped table-bordered">
                <colgroup>
                    <col width="5%">
                    <col width="25%">
                    <col width="25%">
                    <col width="10%">
                    <col width="10%">
                </colgroup>
                <thead>
                    <th class="p-1 text-center">#</th>
                    <th class="p-1 text-center">Fecha</th>
                    <th class="p-1 text-center">Producto</th>
                    <th class="p-1 text-center">Tipo</th>
                    <th class="p-1 text-center">Cantidad</th>
                </thead>
                <tbody>
                    <?php foreach ($productos as $row) : ?>
                        <tr>
                            <th class="p-1 text-center align-middle"><?= $row['id'] ?></th>
                            <td class="px-2 py-1 align-middle"><?= date("Y-m-d", strtotime($row['fecha'])) ?></td>
                            <td class="px-2 py-1 align-middle"><?= $row['name'] ?></td>
                            <td class="px-2 py-1 align-middle"><?= $row['tipo'] == 1 ? 'Entrada' : 'Salida'; ?></td>
                            <td class="px-2 py-1 align-middle text-end"><?= number_format($row['cantidad']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (count($productos) <= 0) : ?>
                        <tr>
                            <td class="p-1 text-center" colspan="7">Sin resultados que mostrar</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<div class="footer">
    <h2><a href="https://www.configuroweb.com/46-aplicaciones-gratuitas-en-php-python-y-javascript/#Aplicaciones-gratuitas-en-PHP,-Python-y-Javascript" style="color: white; text-decoration:none;">Para más desarrollos ConfiguroWeb</a></h2>
</div>
<?= $this->endSection() ?>