<?php
// Connexion à la base de données MySQL
$dsn = 'mysql:host=localhost;dbname=php_crud_app;charset=utf8';
$username = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $username, $password, $options);

// Requête SQL pour récupérer les données
$request = "SELECT * FROM passion ORDER BY id DESC LIMIT 1";


$resultats = $pdo->query($request);

// Initialisation du fichier PDF
require('HSD_fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
// En-tête
// Ajout des images
$pdf->Image('CMC.png', 5, 10, 30, 30);
$pdf->Image('patient-7.png', $pdf->GetPageWidth() - 35, 10, 30, 30);

// Données des patients
while ($row = $resultats->fetch()) {
    // En-tête
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetFillColor(240, 240, 240);
    $pdf->Ln(37);
    $pdf->Cell(0, 20, "Liste des enregistrements des patients", 0, 0, 'C', true);
    $pdf->Ln(10);
    $pdf->Ln(10);
    // Données des patients
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(40, 10, 'Nom complet :', 1);
    $pdf->Cell(0, 10, $row['nomComplet'], 1);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Le genre:', 1);
    $pdf->Cell(0, 10, $row['sex'], 1);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Le telephone:', 1);
    $pdf->Cell(0, 10, $row['telphone'], 1);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'La specialiste:', 1);
    $pdf->Cell(0, 10, $row['spécialiste'], 1);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Consultation:', 1);
    $pdf->Cell(0, 10, $row['consultation'], 1);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Date:', 1);
    $pdf->Cell(0, 10, $row['datee'], 1);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Le temps:', 1);
    $pdf->Cell(0, 10, $row['timee'], 1);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'specialiste 2:', 1);
    $pdf->Cell(0, 10, $row['spécialiste2'], 1);
    $pdf->Ln(20);
    
}
$pdf->Cell(0, 10, "pour enregstrer votre fichier pdf veuillez svp ouvrire le fichier dans google chrome");
$pdf->Ln(20);
$pdf->Image('signature.png', 8, $pdf->GetY(), 30, 40);
$pdf->Image('img.jpeg', $pdf->GetPageWidth() - 35, $pdf->GetY(), 30, 40);



// Envoi du fichier PDF au navigateur
$pdf->Output();
// Envoi du fichier PDF au navigateur
$pdf->Output();









