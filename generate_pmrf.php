<?php
require_once('tcpdf/tcpdf.php');

// =====================
// COLLECT DATA
// =====================
$pin = $_POST['pin'] ?? '';
$lname = $_POST['lname'] ?? '';
$fname = $_POST['fname'] ?? '';
$ext = $_POST['ext'] ?? '';
$mname = $_POST['mname'] ?? '';
$dob = $_POST['dob'] ?? '';
$pob = $_POST['pob'] ?? '';
$mobile = $_POST['mobile'] ?? '';
$barangay = $_POST['barangay'] ?? '';
$city = $_POST['city'] ?? '';
$province = $_POST['province'] ?? '';
$date_signed = $_POST['date_signed'] ?? '';
$signature = $_POST['signature'] ?? '';

// =====================
// CREATE PDF
// =====================
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

$pdf->SetCreator('PMRF System');
$pdf->SetTitle('PhilHealth PMRF Form');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();

// =====================
// HTML CONTENT (PMRF)
// =====================
$html = "
<h2 style='text-align:center;'>PHILHEALTH PMRF FORM</h2>
<hr>

<b>PIN:</b> $pin <br><br>

<b>Name:</b> $lname, $fname $ext $mname <br><br>

<b>Date of Birth:</b> $dob <br><br>

<b>Place of Birth:</b> $pob <br><br>

<b>Address:</b> $barangay, $city, $province <br><br>

<b>Mobile:</b> $mobile <br><br>

<hr>

<b>Signature:</b> $signature <br><br>
<b>Date:</b> $date_signed <br><br>
";

$pdf->writeHTML($html, true, false, true, false, '');

// =====================
// OUTPUT PDF
// =====================
$pdf->Output('pmrf_form.pdf', 'I');
?>