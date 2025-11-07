<?php

namespace frontend\modules\OtrasDeducciones\models;

use common\models\Persona;
use common\models\Utils;
use Mpdf\Mpdf;

class ProviviendaPDF
{
    /**
     * Genera un archivo PDF basado en los datos de la planilla de aportes pro-vivienda.
     *
     * @param array $planilla Lista de los datos de la planilla.
     * @param int|string $gestion El año correspondiente a la planilla.
     * @param int|string $mes El mes correspondiente a la planilla.
     * @return string El contenido del archivo PDF generado.
     */
    public static function generarPdf(array $aperturas, $gestion, $mes)
    {
        ini_set("pcre.backtrack_limit", "5000000");

        $pdf = new Mpdf(['orientation' => 'L', 'default_font' => 'courier', 'default_font_size' => 9]);
        $pdf->setAutoBottomMargin = 'stretch';

        $pdf->SetTopMargin(48);
        $pdf->SetHTMLHeader(self::generarHeader($gestion, $mes));
        $pdf->SetHTMLFooter(self::generarFooter());

        $pdf->WriteHTML(self::generarContenido($aperturas));

        if (!Utils::crearRegistroPDF($pdf->Output('', 'S'), "Aportes Patronales Pro-Vivienda $gestion-$mes")) return null;
        return $pdf->Output('', 'S');
    }

    /**
     * Genera el encabezado para el PDF de la planilla.
     *
     * @param int $gestion El año de gestión para a la planilla.
     * @param int $mes El mes correspondiente a la planilla.
     * @return string El contenido HTML del encabezado.
     */
    private static function generarHeader($gestion, $mes)
    {
        $meses = [
            'ENERO',
            'FEBRERO',
            'MARZO',
            'ABRIL',
            'MAYO',
            'JUNIO',
            'JULIO',
            'AGOSTO',
            'SEPTIEMBRE',
            'OCTUBRE',
            'NOVIEMBRE',
            'DICIEMBRE'
        ];

        ob_start(); ?>

        <div class="text-center" style="width: 16%;">
            U.M.R.P.S.F.X.CH.
        </div>
        <div class="text-center" style="width: 16%;">
            Sucre-Bolivia
        </div>
        <div class="text-center">APORTES PATRONALES PROVIVIENDA</div>
        <div class="text-center">
            (PERN01-PN) PLANILLA DE PERMANENTES <?= $meses[$mes - 1] . '/' . $gestion ?>
        </div>
        <div class="text-center">TOTAL SECTORES</div>
        <div class="separator" style="margin-top: 20px;"></div>
        <table class="table">
            <tr>
                <th style="width: 10%">Nro Item</th>
                <th style="width: 45%">Apellidos y nombres</th>
                <th style="width: 5%">Sector</th>
                <th style="width: 10%">Carnet ID</th>
                <th style="width: 15%">Total Ganado</th>
                <th style="width: 15%">PROVIV 2.0%</th>
            </tr>
        </table>
        <div class="dashed"></div>
    <?php
        return ob_get_clean();
    }

    /**
     * Genera el pie de página para el documento PDF.
     *
     * @return string El contenido HTML del pie de página.
     */
    private static function generarFooter()
    {
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
        return ob_get_clean();
    }

    /**
     * Genera el contenido del PDF.
     *
     * @param array $planilla Lista de los datos de la planilla.
     * @return string El contenido de la planilla en formato HTML.
     */
    private static function generarContenido(array $aperturas)
    {
        $aperturasADM = [];
        $aperturasFAC = [];
        foreach ($aperturas as $codigo => $apertura) {
            if (substr($codigo, 0, 2) == '00') {
                $aperturasADM[$codigo] = $apertura;
            } else {
                $aperturasFAC[$codigo] = $apertura;
            }
        }

        $totalAportesADM = array_sum(array_column($aperturasADM, 'TotalAportes'));
        $totalGanadoADM = array_sum(array_column($aperturasADM, 'TotalGanado'));
        $totalAportesFAC = array_sum(array_column($aperturasFAC, 'TotalAportes'));
        $totalGanadoFAC = array_sum(array_column($aperturasFAC, 'TotalGanado'));
        $totalAportes = $totalAportesADM + $totalAportesFAC;
        $totalGanado = $totalGanadoADM + $totalGanadoFAC;

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
        <!-- Fila con el valor total de aportes pro-vivienda. -->
        <table class="table">
            <tr>
                <td style="height: 20px"></td>
            </tr>
            <tr>
                <td style="width: 70%">TOTAL:</td>
                <td style="width: 15%" class="text-right">
                    <?= number_format($totalGanado, 2, '.', ',') ?>
                </td>
                <td style="width: 15%" class="text-right">
                    <?= number_format($totalAportes, 2, '.', ',') ?>
                </td>
            </tr>
        </table>
        <div class="dashed"></div>
        <div class="dashed"></div>
        <!-- Tabla generada con la información de los funcionarios y el aporte pro-vivienda aplicado. -->
        <div style="height: 15px"></div>
        <table class="table">
            <tr>
                <td style="width: 10%">0000000000</td>
                <td class="text-left" style="width: 60%">ADMINISTRACIÓN Y GESTIÓN UNIVERSITARIA</td>
                <td class="text-right" style="width: 15%"><?= number_format($totalGanadoADM, 2, '.', ',') ?></td>
                <td class="text-right" style="width: 15%"><?= number_format($totalAportesADM, 2, '.', ',') ?></td>
            </tr>
        </table>
        <div class="dashed"></div>
        <table class="table">
            <?php foreach ($aperturasADM as $codigo => $apertura) : ?>
                <tr>
                    <td class="text-left" style="width: 10%"><?= $codigo ?></td>
                    <td class="text-left" style="width: 60%" colspan="3"><?= $apertura['Descripcion'] ?></td>
                    <td class="text-right" style="width: 15%"><?= number_format($apertura['TotalGanado'], 2, '.', ',') ?></td>
                    <td class="text-right" style="width: 15%"><?= number_format($apertura['TotalAportes'], 2, '.', ',') ?></td>
                </tr>
                <?php foreach ($apertura['Items'] as $nro => $item) : ?>
                    <tr>
                        <td class="text-right" style="width: 10%"><?= $nro ?></td>
                        <td style="width: 45%"><?= Persona::generateNombreCompleto($item["Paterno"], $item["Materno"], $item["Nombres"]) ?></td>
                        <td style="width: 5%"><?= $item["CodigoCondicionLaboral"]; ?></td>
                        <td style="width: 10%"><?= $item["IdPersona"]; ?></td>
                        <td style="width: 15%" class="text-right"><?= number_format($item["TotalGanado"], 2, '.', ','); ?></td>
                        <td style="width: 15%" class="text-right"><?= number_format($item["AporteProvivienda"], 2, '.', ','); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </table>
        <div style="height: 15px"></div>
        <table class="table">
            <tr>
                <td style="width: 10%">1000000000</td>
                <td class="text-left" style="width: 60%">FACULTADES, PROYECTOS, UNIDADES DESCENTRALIZADAS</td>
                <td class="text-right" style="width: 15%"><?= number_format($totalGanadoFAC, 2, '.', ',') ?></td>
                <td class="text-right" style="width: 15%"><?= number_format($totalAportesFAC, 2, '.', ',') ?></td>
            </tr>
        </table>
        <div class="dashed"></div>
        <table class="table">
            <?php foreach ($aperturasFAC as $codigo => $apertura) : ?>
                <tr>
                    <td class="text-left" style="width: 10%"><?= $codigo ?></td>
                    <td class="text-left" style="width: 60%" colspan="3"><?= $apertura['Descripcion'] ?></td>
                    <td class="text-right" style="width: 15%"><?= number_format($apertura['TotalGanado'], 2, '.', ',') ?></td>
                    <td class="text-right" style="width: 15%"><?= number_format($apertura['TotalAportes'], 2, '.', ',') ?></td>
                </tr>
                <?php foreach ($apertura['Items'] as $nro => $item) : ?>
                    <tr>
                        <td class="text-right" style="width: 10%"><?= $nro ?></td>
                        <td style="width: 45%"><?= Persona::generateNombreCompleto($item["Paterno"], $item["Materno"], $item["Nombres"]) ?></td>
                        <td style="width: 5%"><?= $item["CodigoCondicionLaboral"]; ?></td>
                        <td style="width: 10%"><?= $item["IdPersona"]; ?></td>
                        <td style="width: 15%" class="text-right"><?= number_format($item["TotalGanado"], 2, '.', ','); ?></td>
                        <td style="width: 15%" class="text-right"><?= number_format($item["AporteProvivienda"], 2, '.', ','); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </table>

<?php
        return ob_get_clean();
    }
}
