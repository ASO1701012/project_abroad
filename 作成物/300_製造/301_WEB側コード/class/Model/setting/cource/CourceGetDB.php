<?php
require_once $_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'ModelBase.php';

class CourceGetDB extends ModelBase
{
    public function country_get():array
    {
        $sql = "SELECT * FROM country";
        $result = $this->db->query($sql);
        $row = $result->fetchAll();
        return $row;
    }

    public function school_get($key):array
    {
        $sql = "SELECT * FROM target_school WHERE country_number=:id";
        $result = $this->db->prepare($sql);
        $result->execute([':id'=>$key]);
        $row = $result->fetchAll();
        return $row;
    }

    //全件習得
    public function get():array
    {
        $sql = "SELECT management_number,country_name,school_name,start_study_abroad,target_amount,period,plan_name FROM study_abroad_plan INNER JOIN target_school ts on study_abroad_plan.target_school = ts.target_school_number INNER JOIN country c on ts.country_number = c.country_number";
        $result = $this->db->query($sql);
        $row = $result->fetchAll();
        return $row;
    }

    //制限習得
    public function restriction_get($key):array
    {
        $sql = "SELECT management_number,country_name,school_name,start_study_abroad,target_amount,period,plan_name FROM study_abroad_plan INNER JOIN target_school ts on study_abroad_plan.target_school = ts.target_school_number INNER JOIN country c on ts.country_number = c.country_number where ts.country_number=:country";
        $result = $this->db->prepare($sql);
        $result->execute([':country'=>$key]);
        $row = $result->fetchAll();
        return $row;
    }
}