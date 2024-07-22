<?php
    require("fpdf.php");

    $pdf = new FPDF();

    if(isset($_POST['submit'])){
        include("../inc/connect.php");
        $sql = "SELECT * FROM user ORDER BY User_ID asc";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $pdf->AddPage();
            $pdf->SetFont("Times", "B", 16);
            $pdf->Cell(210, 10, 'User Record', 0, 1);
            $pdf->Cell(210, 10, '', 0, 1);

            $pdf->SetFont("Times", "B", 12);
            $pdf->Cell(50, 10, 'ID', 1, 0, 'C');
            $pdf->Cell(60, 10, 'Username', 1, 0, 'C');
            $pdf->Cell(80, 10, 'Email', 1, 1, 'C');
            while($row = $result->fetch_assoc()){
                $pdf->Cell(50, 10, $row['User_ID'], 1, 0);
                $pdf->Cell(60, 10, $row['User_Username'], 1, 0);
                $pdf->Cell(80, 10, $row['User_Email'], 1, 1);
            }

            $pdf->Cell(50, 10, 'Total number of users: ' . $result->num_rows . ' users', 0, 1);
        } else {
            
            echo "0 results";
        }

        
        $pdf->Output();
    }
    
?>