<?php

namespace App\Conversion;
use App\Controller;

class ConversionController extends Controller {
    public function websiteToPDF() {
        
    }

    public function htmlToPDF($file, $saveImages, $loadJavaScript) {
        $this->uploadFile($_FILES);
    }

    public function uploadFile($file) {
        $file_tmp = $file['file']['tmp_name'];
        $file_name = $file['file']['name'];
        $file_size = $file['file']['size'];

        $new_file_name = $this->generateRandomString();

        if(is_uploaded_file($file_tmp)) {
            move_uploaded_file($file_tmp, __DIR__."/../../temp/uploads/$new_file_name.html");
        }

        $file_path = '../temp/uploads/'.$new_file_name.'.html';
        echo $file_path;
    }

    public function generatePDF($html) {
        $filename = $this->generateRandomString();
        $mpdf = new \mPDF();
        $mpdf->WriteHTML("<html>".$html."</html>", 0);
        $mpdf->Output(__DIR__."/../../temp/pdf/$filename.pdf", "F");
        echo "/html_pdf/temp/pdf/$filename.pdf";
    }

    public function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

?>