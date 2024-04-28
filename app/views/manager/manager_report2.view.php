<?php

require('C:\xampp\htdocs\finagle\public\libraries\fpdf\fpdf.php');
class PDF extends FPDF
{
    function Header()
    {
        // Logo
        $this->Image(ROOT . '/assets/images/logo.png', 10, 6, 30);
        //Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Title
        $this->Cell(0, 10, 'FINAGLE LANKA PVT LTD', 0, 1, 'C');
        // Additional title
        $this->SetFont('Arial', 'B', 13); // Change font size if needed
        $this->Cell(0, 10, 'Branch Performance Report', 0, 1, 'C');

        // Add the new text
        $this->SetFont('Arial', '', 10); // Reduce font size
        $this->SetX(10); // Set X position to the left side of the page
        $this->Cell(0, 5, 'A14-15, Industrial Estate, Ekala, Ja-ela, Sri Lanka', 0, 1, 'L');
        $this->SetX(10); // Set X position to the left side of the page
        $this->Cell(0, 5, '+94 (0) 11 223 6976', 0, 1, 'L');
        $this->SetX(10); // Set X position to the left side of the page
        $this->Cell(0, 5, 'finaglelankapvt@gmail.com', 0, 1, 'L');
        $this->SetX(10); // Set X position to the left side of the page
        $this->Cell(0, 5, 'www.finagle.lk', 0, 1, 'L');
        // Add a horizontal line
        $y = $this->GetY(); // Get the current y position
        $this->Line(10, $y + 2, 200, $y + 2); // Draw a line from (10, $y + 2) to (200, $y + 2)
        // Line break
        $this->Ln(10);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }


    function Summary($data)
    {
        $this->SetFont('Arial', 'B', 14);
        $this->SetTextColor(0, 0, 0); // Set text color to black
        $this->Cell(0, 10, 'Summary of the Orders', 0, 1, 'L');
        $this->SetFont('Arial', '', 12);

        // Calculate the total cost
        $totalCost = 0;
        if (is_array($data['rows'])) {
            foreach ($data['rows'] as $row) {
                $totalCost += $row->total_cost;
            }
        }

        $this->SetX(5); // Set X position to a bit left of the page
        $this->Cell(90, 10, 'Total Income:', 0);
        $this->SetTextColor(128, 128, 128); // Set text color to grey
        $this->Cell(90, 10, $data['total_income'], 0);
        $this->SetTextColor(0, 0, 0); // Reset text color to black
        $this->Ln();
        $this->SetX(5);
        $this->Cell(90, 10, 'Number of Orders:', 0);
        $this->SetTextColor(128, 128, 128); // Set text color to grey
        $this->Cell(90, 10, $data['num_orders'], 0);
        $this->SetTextColor(0, 0, 0); // Reset text color to black
        $this->Ln();
        $this->SetX(5);
        $this->Cell(90, 10, 'Average Order Value:', 0);
        $this->SetTextColor(128, 128, 128); // Set text color to grey
        $this->Cell(90, 10, $data['average_order_value'], 0);
        $this->SetTextColor(0, 0, 0); // Reset text color to black
        $this->Ln();
        $this->SetX(5); // Set X position to a bit left of the page
        $this->Cell(90, 10, 'Number of Complaints:', 0);
        $this->SetTextColor(128, 128, 128); // Set text color to grey
        $this->Cell(90, 10, $data['num_complaints'], 0);
        $this->SetTextColor(0, 0, 0); // Reset text color to black
        $this->Ln();
    }



    function Content($data)
    {
        // Branch name and date
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];
        $this->SetFont('Arial', 'B', 14); // Set font size for branch name
        $this->SetTextColor(0, 0, 0); // Set text color to black
        $this->SetX(-100); // Set X position to the right side of the page
        $this->Cell(90, 5, 'Borella Branch', 0, 2, 'R');
        $this->SetFont('Arial', '', 10); // Reduce font size for date
        $this->SetTextColor(128, 128, 128); // Set text color to grey
        $this->SetX(-100); // Set X position to the right side of the page
        $this->Cell(90, 5, 'Date: ' . $start_date . ' to ' . $end_date, 0, 1, 'R');
        $this->SetTextColor(0, 0, 0); // Reset text color to black

        // Generated date
        $this->SetFont('Arial', 'B', 12); // Increase font size for generated date
        $this->SetY($this->GetY() - 10); // Move position a bit upwards
        $this->SetX(10); // Set X position to the left side of the page
        $this->Cell(0, 5, 'Generated on: ' . date('Y-m-d'), 0, 1, 'L');
        $this->SetFont('Arial', '', 6); // Reset font size
        $this->Ln(10);
        // Order table
        $this->SetX(5);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(40, 10, 'Order ID', 0);
        $this->Cell(40, 10, 'Customer ID', 0);
        $this->Cell(40, 10, 'Order Type', 0);
        $this->Cell(40, 10, 'Bill Amount', 0);
        $this->Cell(40, 10, 'Order Status', 0);
        $this->Ln();
        $this->Line(5, $this->GetY(), 205, $this->GetY());
        $this->SetFont('Arial', '', 10);

        if (is_array($data['rows']) || is_object($data['rows'])) {
            foreach ($data['rows'] as $row) {
                $this->SetX(5);
                $this->SetTextColor(108, 108, 108);
                $this->Cell(40, 10, $row->id, 0);
                $this->Cell(40, 10, $row->customer_id, 0);
                $this->Cell(40, 10, $row->delivery_or_pickup, 0);
                $this->Cell(40, 10, $row->total_cost, 0);
                $this->Cell(40, 10, $row->order_status, 0);
                $this->Ln();
                $this->Line(5, $this->GetY(), 205, $this->GetY()); // Draw a line
            }
        }

        $this->Ln(10); // Add space between tables

        $this->Summary($data);
    }
}

// Create PDF object
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Generate content
$pdf->Content($data);

// Output PDF
$pdf->Output('I', 'Borella_branch.pdf');
