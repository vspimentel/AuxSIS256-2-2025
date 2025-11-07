<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Mpdf\Mpdf;

include("conexion.php");

Header('Content-Type: application/pdf');

ob_start(); ?>
<div class="text-center">LISTA DE MEDICOS</div>
<div class="separator" style="margin-top: 20px;"></div>
<table class="table">
    <tr>
        <th style="width: 25%; text-align: left;">Nombre</th>
        <th style="width: 25%; text-align: left;">Especialidad</th>
        <th style="width: 25%; text-align: left;">Teléfono</th>
        <th style="width: 25%; text-align: left;">Correo</th>
    </tr>
</table>
<div class="separator"></div>
<?php
$header = ob_get_clean();

ob_start(); ?>
<div class="dashed"></div>
<table style="width: 100%; font-size: 8pt;">
    <tr>
        <td style="width: 50%; text-align: left;">
            <?= date('Y-m-d H:i:s') ?>
        </td>
        <td style="width: 50%; text-align: right;">
            {PAGENO}/{nbpg}
        </td>
    </tr>
</table>
<?php
$footer =  ob_get_clean();

$sql = "SELECT * FROM medicos";

$result = $con->query($sql);

ob_start(); ?>
<style>
    .container {
        padding: 20px;
    }

    .separator,
    .dashed {
        border-top: 1px solid black;
        width: 100%;
        margin: 5px 0;
    }

    .dashed {
        border-top: 1px dashed black;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 5px;

    }

    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }
</style>

<table class="table">
    <tbody>
        <?php while ($medico = mysqli_fetch_array($result)): ?>
            <tr>
                <td style="width: 25%;"><?= $medico['nombre'] ?></td>
                <td style="width: 25%;"><?= $medico['especialidad'] ?></td>
                <td style="width: 25%;"><?= $medico['telefono'] ?></td>
                <td style="width: 25%;"><?= $medico['correo'] ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();

$pdf = new Mpdf(['orientation' => 'L', 'default_font' => 'courier', 'default_font_size' => 10]);

$pdf->setAutoBottomMargin = 'stretch';
$pdf->SetTopMargin(30);

$pdf->SetHTMLHeader($header);
$pdf->SetHTMLFooter($footer);
$pdf->WriteHTML($content);

$pdf->Output('lista-medicos.pdf', 'I');
