<?php
require_once('./libs/TCPDF-main/tcpdf.php');

// Extend the TCPDF class to create custom header and footer
class MYPDF extends TCPDF {
    
    // Header
    public function Header() {
        // Set font
        $this->SetFont('helvetica', 'B', 12);
        // Title
        $this->Cell(0, 10, 'Invoice', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        // Line break
        $this->Ln(10);
    }
}

// Create a new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('TCPDF');
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Invoice');
$pdf->SetSubject('Invoice');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// Set default font
$pdf->SetFont('helvetica', '', 10);

// Add a page
$pdf->AddPage();

// Set some content to be displayed
$content = '<h1>Invoice Details</h1>';
$content .= '<table border="1">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                <tr>
                    <td>Product A</td>
                    <td>2</td>
                    <td>$20.00</td>
                </tr>
                <tr>
                    <td>Product B</td>
                    <td>1</td>
                    <td>$10.00</td>
                </tr>
            </table>';

// Print content using WriteHTMLCell()
$pdf->writeHTML($content, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('example.pdf', 'I');
