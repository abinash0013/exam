<?php

    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // get database connection
    include_once '../config/database.php';
    
    include_once '../objects/pdf.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $Pdf = new Pdf($db);
    $data = json_decode(file_get_contents("php://input"));
    
    // make sure data is not empty 
    $Pdf->lg=$data->lg;
     $Pdf->subjectId=$data->subjectId;
    // $stmt = $Course->get_course();
    $stmt = $Pdf->pdfList();
    $num = $stmt->rowCount();
    
    // check if more than 0 record found
    if ($num > 0) {
        $data_arr = array(); 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($Pdf->lg == 'en'){
                array_push(
                    $data_arr, 
                    array("pdfId"=>$row["pdfId"],
                        "pdfTitle"=>$row["pdfTitle"],
                        "pdfDescription"=>$row["pdfDescription"],
                        "chapterId"=>$row["chapterId"],
                        "subjectId"=>$row["subjectId"],
                        "courseId"=>$row["courseId"],
                        "pdfImage"=>$row["pdfImage"],
                        "pdfUrl"=>$row["pdfUrl"],
                        "createdAt"=>$row["createdAt"]
                    )
                );
            }else{
                array_push(
                    $data_arr,
                    array("pdfId"=>$row["pdfId"],
                        "pdfTitle"=>$row["pdfTitleHi"],
                        "pdfDescription"=>$row["pdfDescriptionHi"],
                        "chapterId"=>$row["chapterId"],
                        "subjectId"=>$row["subjectId"],
                        "courseId"=>$row["courseId"],
                        "pdfImage"=>$row["pdfImage"],
                        "pdfUrl"=>$row["pdfUrl"],
                        "createdAt"=>$row["createdAt"]
                    )
                ); 
            }
        }
        echo json_encode(array("status" => "200", "message" => "Data Found", "data" => $data_arr));
    } else {
        echo json_encode(array("status" => "201", "message" => "No Request Found", "data" => []));
    }
?>