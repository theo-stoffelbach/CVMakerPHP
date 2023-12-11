<?php

require('../fpdf186/fpdf.php');
class PDF extends FPDF
{
    function Header()
    {
        global $titre;
        $titre = iconv('UTF-8', 'windows-1252', "{Name}");

        // Arial gras 15
        $this->SetFont('Arial','',32);
        // Calcul de la largeur du titre et positionnement
        $w = $this->GetPageWidth();
        $this->SetY(0);
        $this->SetX(0);

        $this->SetFillColor(51, 83, 132);
        $this->Rect(0, 0, $w, 45, 'F'); // Rect(x, y, largeur, hauteur, 'F' pour remplir)


        $this->SetTextColor(240,240,240);
        $this->SetLineWidth(0);

        $this->Cell($w, 25, '{Name}', 0, 1, 'C',true);
        $this->SetX(0);
        
        $this->SetFont('Arial','B',18);
        $this->Cell($w, 10, '{POST}', 0, 1, 'C',true  );

        $this->Ln(15);
    }


    function TitreChapitre($libelle)
    {

        $text = iconv('UTF-8', 'windows-1252', "$libelle");
        
        $textWidth = $this->GetStringWidth($text);
        $textHeight = $this->FontSize;

        $x = $this->GetX();
        $y = $this->GetY();

        // Obti ens la largeur et la hauteur du texte
        $this->SetFont('Arial', 'B', 18);

        // Dessine le texte
        $this->Cell($textWidth, $textHeight,$text, 0, 1, 'L',FALSE);
        $this->Ln(); // Saut de ligne

        // Déplace le soulignement en fonction de la hauteur du texte
        $this->SetLineWidth(0.5);
        $this->Line($x, $y + $textHeight, $x + $textWidth, $y + $textHeight);
    }

    function AddDesc($libelle)
    {

        $text = iconv('UTF-8', 'windows-1252', "$libelle");
        
        $textWidth = $this->GetStringWidth($text);
        $textHeight = $this->FontSize;

        $this->SetFont('Arial', '', 14);


        $x = $this->GetX();
        $y = $this->GetY();
        // Obti ens la largeur et la hauteur du texte

        // Dessine le texte
        $this->Cell($textWidth, $textHeight,$text, 0, 0, 'L',FALSE);

    }

    function AjouterChapitre($titre)
    {
        $this->TitreChapitre($titre);
        $this->AddDesc("fgfjdngjfdngjfdngjnbgfj");
    }


}

$pdf = new PDF();
$pdf->AddPage();

$titre = 'Théo Stoffelbach';
$pdf->SetTitle($titre);
$pdf->SetAuthor('Jules Verne');
$pdf->AjouterChapitre('Compétences');
// $pdf->AjouterChapitre(2,'LE POUR ET LE CONTRE','20k_c2.txt');
$pdf->Output();
?>