<?php

require("connect/connect.php");

ini_set("display error", "1");

 function adduser($nom,$date_naissance,$genre,$ville,$email,$mdp){
        $sql = "insert into final_membre(email,mdp,nom,date_naissance,genre,ville,image_profil) values ('%s','%s','%s','%s','%s','%s','default.png')";
        $sql= sprintf($sql, $email,$mdp,$nom,$date_naissance,$genre,$ville);

        //echo $sql;
        $result = mysqli_query(dbconnect(), $sql);
    }

    function addemprunt($id_membre,$id_objet,$durée){
        $sql = "insert into final_emprunt (id_objet,id_membre,date_emprunt,date_retour)
        values ($id_objet,$id_membre,".DATE().",".CURRENT_DATE + $durée.")";


        //echo $sql;
        $result = mysqli_query(dbconnect(), $sql);
    }
    
    // function verifyuser($email,$mdp){
    //     $sql = "select * from final_membre(email,mdp) where email= '%s' && mdp = '%s'";
    //     $sql = sprintf($sql, $email, $mdp);
    //     $ql = mysqli_query(dbconnect(), $sql);
        
    //     if($list=mysqli_fetch_assoc($ql)){
    //         return $list['id_membre'];
    //     }    
    //     else{
    //         return 0;
    //     }    
    // }

    function verifyuser($email, $mdp) {
    $sql = "SELECT * FROM final_membre WHERE email='%s' AND mdp='%s'";
    $sql = sprintf($sql, $email, $mdp);
    $ql = mysqli_query(dbconnect(), $sql);

    if ($list = mysqli_fetch_assoc($ql)) {
        return $list['id_membre'];
    } else {
        return 0;
    }
}

    function afficher_objet(){
        $sql =" SELECT * from v_objet_detail";
        $result = mysqli_query(dbconnect(), $sql);
        // echo $sql;
        
        if ($result){
            $liste = [];
            while ($row = mysqli_fetch_assoc($result)){
                $liste[]= $row;
            } 
            return $liste;
        }else{
            $liste = [];
            return $liste;
        }
    }

    function verify_date(){
        $sql =" SELECT * from v_objet_detail
         as v join final_emprunt as e on v.id_objet = e.id_objet";
        $result = mysqli_query(dbconnect(), $sql);
        // echo $sql;
        
        if ($result){
            $liste = [];
            while ($row = mysqli_fetch_assoc($result)){
                $liste[]= $row;
            } 
            return $liste;
        }else{
            $liste = [];
            return $liste;
        }
    }

    function afficher_categorie(){
        $sql =" SELECT * from final_categorie_objet";
        $result = mysqli_query(dbconnect(), $sql);
        //echo $sql;
        
        if ($result){
            $liste = [];
            while ($row = mysqli_fetch_assoc($result)){
                $liste[]= $row;
            } 
            return $liste;
        }else{
            $liste = [];
            return $liste;
        }
    }

    function filter_categorie($id){
        $sql = "SELECT * from v_objet_detail
        where id_categorie = $id";
        $result = mysqli_query(dbconnect(), $sql);
        //echo $sql;
        
        if ($result){
            $liste = [];
            while ($row = mysqli_fetch_assoc($result)){
                $liste[]= $row;
            } 
            return $liste;
        }else{
            $liste = [];
            return $liste;
        }
    }
    

    function add_objet($nomobjet, $idcategorie, $idmembre){
        //$sql="insert into v_objet_images_simple(nom_objet, id_categorie, id_membre, nom_image)
        //values ('%s', $idcategorie, $idmembre, '%s')";

        $sql="insert into final_objet values '%s', $idcategorie, $idmembre";
        $sql = sprintf($sql, $nomobjet);
        echo $sql;
        $result = mysqli_query(dbconnect(),$sql);
        if ($list = mysqli_fetch_assoc($result)) {
            return $list['id_objet'];
        }
    }

    function add_images($nomimage, $id){
        $sql="insert into final_images_objet(id_objet, nom_image) values $id, '%s'" ;
        $sql = sprintf($sql, $nomimage);
        echo $sql;
        $result = mysqli_query(dbconnect(),$sql);
    }

    function rech_categorie($name){
        $sql = "SELECT * from v_objet_detail
        where id_categorie = $name";
        $result = mysqli_query(dbconnect(), $sql);
        echo $sql;
        
        if ($result){
            $liste = [];
            while ($row = mysqli_fetch_assoc($result)){
                $liste[]= $row;
            } 
            return $liste;
        }else{
            $liste = [];
            return $liste;
        }
    }

    function rech_object($name){
        $sql = "SELECT * from v_objet_detail
        where nom_objet like '%$name%'";
        $result = mysqli_query(dbconnect(), $sql);
        // echo $sql;
        
        if ($result){
            $liste = [];
            while ($row = mysqli_fetch_assoc($result)){
                $liste[]= $row;
            } 
            return $liste;
        }else{
            $liste = [];
            return $liste;
        }
    }

?>