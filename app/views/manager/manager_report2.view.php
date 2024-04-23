<?php
require('C:\xampp\htdocs\finagle\public\libraries\fpdf\fpdf.php');
class PDF extends FPDF
{
    // Page header
    function Header()
    {
       // Logo
       $this->Image(ROOT . '/assets/images/logo.png', 10, 6, 30);
        //Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Title
        $this->Cell(0, 10, 'FINAGLE LANKA PVT LTD', 0, 1, 'C');
        // Additional title
        $this->SetFont('Arial', 'B', 12); // Change font size if needed
        $this->Cell(0, 10, 'Branch Performance Report', 0, 1, 'C');
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
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Summary', 0, 1, 'L');
        $this->SetFont('Arial', '', 12);

        // Calculate the total cost
        $totalCost = 0;
        foreach ($data['rows'] as $row) {
            $totalCost += $row->total_cost;
        }
        $this->Cell(0, 10, 'Number of Complaints: ' . $data['num_complaints'], 0, 1, 'L');
        // $this->Cell(0, 10, 'Total Income: ' . $totalCost, 0, 1, 'L');
        $this->Cell(0, 10, 'Total Income: ' . $data['total_income'], 0, 1, 'L');
        $this->Cell(0, 10, 'Number of Orders: ' . $data['num_orders'], 0, 1, 'L');
        $this->Cell(0, 10, 'Average Order Value: ' . $data['average_order_value'], 0, 1, 'L');
        $this->Cell(0, 10, 'Most Common Payment Method: ' . $data['most_common_payment_method'], 0, 1, 'L');

        // Display order status breakdown
        foreach ($data['order_status_breakdown'] as $status) {
            $this->Cell(0, 10, 'Number of Orders (' . $status->order_status . '): ' . $status->count, 0, 1, 'L');
        }

        // Display number of deliveries and pickups
        foreach ($data['delivery_pickup_counts'] as $delivery_pickup) {
            $this->Cell(0, 10, 'Number of Orders (' . $delivery_pickup->delivery_or_pickup . '): ' . $delivery_pickup->count, 0, 1, 'L');
        }
    }


    // Content
    function Content($data)
    {
        // Branch name and date
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, 'Borella Branch', 0, 1, 'L');
        $this->Cell(0, 10, 'Date: ' . date('Y-m-d'), 0, 1, 'L');
        $this->Ln(10); // Add a blank line

        // Product table
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(40, 10, 'Order ID', 1);
        // $this->Cell(40, 10, 'Name', 1);
        $this->Cell(40, 10, 'Delivery or Pickup', 1);
        $this->Cell(40, 10, 'Payment Method', 1);
        $this->Cell(40, 10, 'Bill Amount', 1);
        $this->Cell(40, 10, 'Order Status', 1);
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
            // $this->Cell(40, 10, $row->name, 1);
            $this->Cell(40, 10, $row->delivery_or_pickup, 1);
            $this->Cell(40, 10, $row->payment_method, 1);
            $this->Cell(40, 10, $row->total_cost, 1);
            $this->Cell(40, 10, $row->order_status, 1);
            $this->Ln();
        }

        $this->Ln(10); // Add space between tables

        $this->Summary($data);

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
