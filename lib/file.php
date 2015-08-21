<?php

class file_controller
{
	public function show()
    {
        $namafile = $_GET['foto'];
        $file = IMAGE_CACHE.$namafile;

        if (file_exists($file)) {
            $filename = basename($file);
            $file_extension = strtolower(substr(strrchr($filename,"."),1));
            
            switch( $file_extension ) {
                case "gif": $ctype="image/gif"; break;
                case "png": $ctype="image/png"; break;
                case "jpeg": $ctype="image/jpeg"; break;
                case "jpg": $ctype="image/jpg"; break;
                default:
            }
            
            header('Content-type: ' . $ctype);
            header('content-disposition: inline; filename="'.$namafile.'";');
            //ob_clean();
            //flush();
            readfile($file);
            //exit;
        }
    }
}

