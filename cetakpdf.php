<?php
session_start();
ob_start();
?>
<page>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        #header {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            height: 100px; /* Adjust the height as needed */
            /* width: auto;  Maintain aspect ratio */
        }

        .header-text {
            flex-grow: 1;
            text-align: center;
        }

        .header-text h4, .header-text h2, .header-text h3, .header-text h5 {
            margin: 0;
        }

        .text-underline {
            text-decoration: underline;
        }

        .text-center {
            text-align: center;
        }

        #judul {
            margin: 10px 0px 30px 0px;
        }

        .table-container {
            width: 70%;
            /* Adjust this value to control the table width */
            margin: 0 auto;
            /* Centers the table on the page */
        }

        table {
            width: 100%;
            text-align: center;
            border-collapse: collapse;
            margin: 7px 0px 15px 0px;
        }

        table th,
        table td {
            border: solid 1px #e9ecef;
            padding: 5px;
        }

        table th {
            border-bottom: solid 2px #e9ecef;
            font-weight: bold;
        }

        table tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        .text-green {
            color: #28a745;
        }
    </style>
    <div id="header">
        <div class="header-text">
    
        <img src="asset/logon.png" height="150px"; width="100px" alt="Studio Withme Logo" class="logo">
    
            <h4>Sistem Pendukung Keputusan Pemilihan Hasil Foto</h4>
            <h2>Studio Withme</h2>
            <h3>Gg. H. Maun No. 110, RT.7/RW.6, Tanjung Barat, Jagakarsa, Jakarta Selatan, DKI Jakarta</h3>
            <h5>+62 812-8829-3528</h5>
        </div>
    </div>
    <div id="judul" class="text-center">
        <p class="text-underline">Hasil Perhitungan</p>
    </div>
    <div id="body">
        <?php
        include 'hasil.php';
        ?>
    </div>
    <br><br><br><br><br><br><br>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jakarta, <?php
// Array of month names in Indonesian
$months = [
    1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
    7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
];

// Get current date
$date = new DateTime();
$day = $date->format('d');
$month = $date->format('n'); // Numeric month without leading zero
$year = $date->format('Y');

// Format the date
$formattedDate = $day . '-' . $months[$month] . '-' . $year;

echo $formattedDate;
?></p>
 <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pemilik</p>
    <br><br><br><br><br><br><br>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<u>Irwandi</u>)</p>
    <page_footer>
        <i style="font-size:9pt;">dicetak oleh <b><?php echo $_SESSION['user'];  ?></b></i>
    </page_footer>
</page>
<?php
$content=ob_get_clean();
require __DIR__.'/class/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
$pdf=new Html2Pdf();
$pdf->writeHTML($content);
$pdf->output();
