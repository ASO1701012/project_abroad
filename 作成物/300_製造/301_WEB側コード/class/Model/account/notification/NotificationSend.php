<?php
require_once($_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'notification'.DIRECTORY_SEPARATOR.'NotificationSelectDB.php');


class NotificationSend extends NotificationSelectDB
{
    public function sendNofitication($school)
    {
        try{
            $sql = 'SELECT LINE_ID
                FROM user U INNER JOIN course_participant cp ON U.student_number = cp.student_number
                            INNER JOIN affiliation_management a ON U.affiliation_number = a.affilation_number
                WHERE ';
            $cnt = 0;
            $where="";
            foreach ($school as $items){
                if($cnt == 0){
                    $where ="(a.school_number = '".$items[$cnt]."'";
                }else{
                    $where = $where."OR a.school_number = '".$items[$cnt]."'";
                }

                $cnt++;
            }

            $sql = $sql .$where.");";
            var_dump($sql);
            echo "<br/>";

            $ans = $this -> db ->query($sql);
            return $ans;
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}