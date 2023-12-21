<?php
class Csv
{
    static function export($datas,$fexport)
    {
        header('Content-Type: text/csv;');
        header('Content-Disposition: attachment; filename="'.$fexport.'"');
        $i = 0;
        foreach($datas as $v) {
            if($i == 0) {
                echo '"' . implode('";"',array_keys($v)).'"'."\n";
            }
            echo '"' . implode('";"',$v).'"'."\n";
            $i++;
        }
    }
}
?>