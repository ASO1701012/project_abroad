<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '' . DIRECTORY_SEPARATOR . 'abroad_web' . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'setting' . DIRECTORY_SEPARATOR . 'cource' . DIRECTORY_SEPARATOR . 'CourceGetDB.php');


class CourceGet
{
    private $db;

    public function __construct()
    {
        $this->db = new CourceGetDB();
    }

    public function get()
    {
        //countryの一覧を習得する
        //一覧のデータを習得する
        //習得したデータを連想配列に纏める
        //配列を返す

//        $ans['country'] = $this->db->country_get();
        $ans['country'] = $this->country_get();
        $ans['data'] = $this->body_data_all_get();
        return $ans;
    }

    /**
     * @return CourceGetDB
     */
    public function country_get()
    {
        $country = $this->db->country_get();
        foreach ($country as $key=>$value){
            $country_lst[] = "<option value=".$value['country_number'].">".$value['country_name']."</option>";
        }
        return implode('',$country_lst);
    }

    public function school_get($key){
        $ans = $this->db->school_get($key);
        foreach ($ans as $key=>$value){
            $lst[] = "<option value=".$value['target_school_number'].">".$value['school_name']."</option>";
        }
        return $lst;
    }

    public function restriction_get($key)
    {
        $data = $this->db->restriction_get($key);
        $data_lst = $this->shaping($data);
        return $data_lst;
    }

    private function shaping($data){
        foreach ($data as $key=>$value){
            $data_lst[] = "<tr>".
                "<td>".$value["school_name"]."</td>
               <td>".$value["plan_name"]."</td>
               <td>".$value['period'].'日'."</td>
               <td>".((int)$value["target_amount"])."</td>
               <td>".'null'."</td>
               </tr>";
        }
        return $data_lst;
    }

    public function body_data_all_get(){
        $data = $this->db->get();
        $data_lst = $this->shaping($data);
        return implode('',$data_lst);
    }
}



