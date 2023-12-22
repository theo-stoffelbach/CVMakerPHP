<?php
require('../fpdf186/fpdf.php');


class PDF extends FPDF
{
    function HeaderCV($name,$post)
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

        $this->Cell($w, 25, $name, 0, 1, 'C',true);
        $this->SetX(0);
        
        $this->SetFont('Arial','B',18);

        $this->Cell($w, 10, $post, 0, 1, 'C',true  );

        $this->Ln(20);
    }

    function TitreChapitre($libelle)
    {

        $text = iconv('UTF-8', 'windows-1252', "$libelle");

        $x = $this->GetX();
        $y = $this->GetY();

        // Obti ens la largeur et la hauteur du texte
        $this->SetFont('Arial', 'B', 18);
        $this->SetTextColor(20,20,20);

        $textWidth = $this->GetStringWidth($text);
        $textHeight = $this->FontSize;


        // Dessine le texte
        $this->Cell($textWidth, $textHeight,$text, 0, 1, 'L',FALSE);
        $this->Ln(); // Saut de ligne

        // Déplace le soulignement en fonction de la hauteur du texte
        $this->SetLineWidth(0.5);
        $this->Line($x, $y + $textHeight, $x + $textWidth, $y + $textHeight);
    }

    function AddDesc($description)
    {

        $text = iconv('UTF-8', 'windows-1252', "$description");
        
        $textWidth = $this->GetStringWidth($text);
        $pageWidth = $this->GetPageWidth();

        $textHeight = $this->FontSize;

        $this->SetFont('Arial', '', 14);
        $this->SetTextColor(20,20,20);

        $this->Cell($pageWidth, $textHeight, $text, 0, 1, 'L',FALSE);
        }

        function SetTitleCV($title) 
        {
            $titles = iconv('UTF-8', 'windows-1252', "$title");
        }
    

    function AjouterChapitre($title, ...$args)
    {
        $this->TitreChapitre($title);

        foreach($args as $desc) {
            $this->AddDesc($desc);
        }

        $this->Ln(10); // Saut de ligne
    }
}

function CreateViewOfCV($valuesUser) {

    ob_start();
    $pdf = new PDF();
    $pdf->AddPage();    

    // $titre = 'Théo Stoffelbach';
    
    $pdf->HeaderCV($valuesUser['firstname'] . ' '. $valuesUser['lastname'],$valuesUser['phone']);
    $pdf->AjouterChapitre('Information', "téléphone : " . $valuesUser['phone'], "email : " . $valuesUser['email'], "test", "rerefdsfds" . "rfefdsfsd");
    
    $pdf->AjouterChapitre('Expérience professionnel : ', $valuesUser['experience']);
    $pdf->AjouterChapitre('Parcours académique : ',$valuesUser['school']);
    
    
    $pdf->Output();
    ob_end_flush(); 

}


?>