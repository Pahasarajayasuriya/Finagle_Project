<?php
    require('E:\Flutter Package\xampp\htdocs\finagle\public\libraries\fpdf186\fpdf.php');
    // C:\xampp\htdocs\finagle2\public\libraries\fpdf

    class PDF extends FPDF {
        // Page header
        function Header() {
            // Logo
            // $this->Image('logo.png',10,6,30);
            // Arial bold 15
            $this->SetFont('Arial','B',15);
            // Title
            $this->Cell(0,10,'FINAGLE',0,1,'C');
            // Line break
            $this->Ln(10);
        }
    
        // Page footer
        function Footer() {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    
        // Content
        function Content($data) {
            // Branch name and date
            $this->SetFont('Arial', '', 12);
            $this->Cell(0, 10, 'Borella Branch', 0, 1, 'L');
            $this->Cell(0, 10, 'Date: ' . date('Y-m-d'), 0, 1, 'L');
            $this->Ln(10); // Add a blank line
            
            // Product table
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(40, 10, 'Customer ID', 1);
            $this->Cell(40, 10, 'Name', 1);
            $this->Cell(40, 10, 'Delivery or Pickup', 1);
            $this->Cell(40, 10, 'Payment Method', 1);
            $this->Ln();
            $this->SetFont('Arial', '', 12);
            // Hardcoded product data
            $products = array(
                array('Product 1', 10, 'Type A', 50),
                array('Product 2', 20, 'Type B', 30),
                // Add more data as needed
            );
    
            // foreach ($products as $row) {
            //     $this->Cell(40, 10, $row[0], 1);
            //     $this->Cell(40, 10, $row[1], 1);
            //     $this->Cell(40, 10, $row[2], 1);
            //     $this->Cell(40, 10, $row[3], 1);
            //     $this->Ln();
            // }

            foreach ($data['rows'] as $row) {
                $this->Cell(40, 10, $row->id, 1);
                $this->Cell(40, 10, $row->name, 1);
                $this->Cell(40, 10, $row->delivery_or_pickup, 1);
                $this->Cell(40, 10, $row->payment_method, 1);
                $this->Ln();
            }
    
            $this->Ln(10); // Add space between tables
    
            // Employee table
            // $this->SetFont('Arial', 'B', 12);
            // $this->Cell(60, 10, 'Employer Name', 1);
            // $this->Cell(60, 10, 'User Name', 1);
            // $this->Cell(60, 10, 'Goals Achieved', 1);
            // $this->Ln();
            // $this->SetFont('Arial', '', 12);
            // // Hardcoded employee data
            // $employees = array(
            //     array('John Doe', 'johndoe@example.com', 80),
            //     array('Jane Smith', 'janesmith@example.com', 90),
            //     // Add more data as needed
            // );
    
            // foreach ($employees as $row) {
            //     $this->Cell(60, 10, $row[0], 1);
            //     $this->Cell(60, 10, $row[1], 1);
            //     $this->Cell(60, 10, $row[2], 1);
            //     $this->Ln();
            // }
        }
    }
    
    // Create PDF object
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    
    // Generate content
    $pdf->Content($data);
    
    // Output PDF
    $pdf->Output();
    
    
?>