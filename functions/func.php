<?php

function Read_file_in_array(string $filename,string $reading_mode)
{
    if($reading_mode=='r') {
        if (($file1 = fopen($filename, $reading_mode)) !==false) {
      
            while (($data = fgetcsv($file1, 1000, ",")) !==false)
           {
               $file_arr[] = $data;
              
           }
       }
    }
    else echo "не вірний режим читання";
    
   fclose($file1);//закриваємо перший файл після проведення читання данних
   return $file_arr;
}

function black_friday_remove($arr)
{
    for ($j=1; $j <count($arr) ; $j++) { //обрізаемо приставку -black-friday
        $arr[$j][0]=substr($arr[$j][0],0,-13);  
         
    }
    return $arr;
}

function black_friday_add($arr)
{
    for ($j=1; $j <count($arr) ; $j++) { //додаємо приставку -black-friday
        $arr[$j][0]=$arr[$j][0]."-black-friday";  
         return $arr;
    }
}

function Write_file_from_array(string $filename,string $reading_mode,$arrayData)
{
    if (($file2 = fopen($filename, $reading_mode)) !==false) {
      
        foreach($arrayData as $line){
            fputcsv($file2,$line);
        }
    }
    fclose($file2);//закриваємо другий файл після проведення читання данних
    return $arrayData;
}