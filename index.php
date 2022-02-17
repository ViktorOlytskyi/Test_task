<?php

require_once ('params.php');
require_once (__DIR__.'/functions/func.php');
require_once ('init.php');

$file1_arr = Read_file_in_array($file1_name,'r');
$file2_arr = Read_file_in_array($file2_name,'r');
$file2_arr = black_friday_remove($file2_arr);


for ($i=1; $i <count($file1_arr) ; $i++) { //Перезаписуємо з масиву файлу один дані в масив файлу два перевіряючи умови
    $processedStrings++;
    for ($j=1; $j <count($file2_arr) ; $j++) { 
        
        if ($file1_arr[$i][0]==$file2_arr[$j][0]
        &&$file1_arr[$i][2]==$file2_arr[$j][2]
        &&$file1_arr[$i][3]==$file2_arr[$j][3]
        &&$file1_arr[$i][4]==$file2_arr[$j][4]
        &&$file1_arr[$i][5]==$file2_arr[$j][5]
        &&$file1_arr[$i][6]==$file2_arr[$j][6]
        &&$file1_arr[$i][7]==$file2_arr[$j][7]
        ) {
            $file2_arr[$j][11]=$file1_arr[$i][11] ;
            $updatedStrings++;
        }
    }

}

$file2_arr = black_friday_add($file2_arr);



Write_file_from_array($file2_name, 'w',$file2_arr);

\spl_autoload_register(function ($className)
{
    $filePath = __DIR__."/classes/{$className}.php";
    if (\is_readable($filePath)) {
        include_once $filePath;
    }
    
});

FileLogger::logTo(__DIR__.'/logs/statistics.txt');
FileLogger::logItem("оброблено строк: ".$processedStrings);
FileLogger::logItem("оновлено строк: ".$updatedStrings);

echo "<br>Файл записаний!";
echo "<br>оброблено строк: {$processedStrings}<br>оновлено строк: {$updatedStrings}" ;
