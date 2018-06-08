<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
include('resize_crop.php');


function prov($per){
	if (isset($per)) {
		$per = stripslashes($per);
		$per = htmlspecialchars($per);
		$per = addslashes($per);		 
	}
	return $per;
}



if(isset($_POST)){
    //$filenew = time().rand(100,999).'.jpg';
    $dir_dump = str_replace("/admin/edit_news","/admin/edit_news/dump_img/", __DIR__);
    $files_dump = scandir($dir_dump,1);
    $countFiles_dump = count($files_dump);
    for($z=0;$z<$countFiles_dump;$z++) {
        //unlink($dir_dump . $files_dump[$z]);


        $x1 = prov($_POST['x1']);
        $x2 = prov($_POST['x2']);
        $y1 = prov($_POST['y1']);
        $y2 = prov($_POST['y2']);
        $img = prov($_POST['img']);
        $crop = prov($_POST['dump_img']);

        $nameImg = explode(".", $img);
        $nameImgFin = str_replace("img/", "", $nameImg);


    }

    $i = rand(0,10);
    $filenew = $nameImgFin[0].'.jpg';
    crop($img, $crop . $filenew, array($x1, $y1, $x2, $y2));
    echo $filenew;


}





?>