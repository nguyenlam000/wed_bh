<?php
class Format{

    //convert data to "F j Y, g:i a"
    public function formatDate($date){
        return  date("F j Y, g:i a", strtotime($date));
    }

    //get the maximum $limit character
    public function textShorten($text, $limit){
        $text = $text . " ";
        $text = substr($text, 0, $limit);
        $text = $text . "...";
        return $text;
    }

    //delete character space, especially
    public function validation($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //set title
    public function title(){
        $title = $_SERVER['SCRIPT_FILENAME'];
        $title = basename($title, ".php");
        if($title == "index"){
            $title = "home";
        }else if($title == "contact"){
            $title = "contact";
        }
        return $title = ucfirst($title);
    }
}
?>