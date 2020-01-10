<?php
require_once($_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'operation'.DIRECTORY_SEPARATOR.'ListDB.php');

class CategoryLearningDB extends ListDB
{
    public function category_list($lst)
    {
        $category_list = [];
        foreach ($lst as $key=>$value){
            try{
                $sql = sprintf('
                    SELECT
                        %s
                    FROM
                         %s
                    ;
                ',$value,$key);
                $stmt = $this->db->query($sql);
                $rows = $stmt->fetchAll();
                $category_list[$key] = $rows;
            }catch (PDOException $e){
                echo $e->getMessage();
            }
        }
        return $category_list;
    }
}