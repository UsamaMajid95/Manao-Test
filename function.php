<?php

session_start();


class Register {
    public function registration($login,$password,$confirm_password,$email,$name){
        
        $duplicate =file_get_contents('data.json');
        $json_data = json_decode($duplicate,TRUE);
        foreach($json_data as $item){
            if($login == $item["login"]){
                return 10;
                //This user already exist
            }
        }            
        if($password == $confirm_password ){
            $password_hash = md5($password);
            $password_hash2 =md5($confirm_password); 
            $new_user = array('login'=>$login,'password'=>$password_hash,'confirm_password'=>$password_hash2,'email'=>$email,'name'=>$name);
            array_push($json_data,$new_user);
            $encode_data=json_encode($json_data,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            file_put_contents('data.json',$encode_data);
            
            return 1;
            // register successfully
        
        }else {
            return 100;
            //password dosenot match

        }       
        
    }
}

class Login {
    
    public function login_user($login,$password){
        $duplicate =file_get_contents('data.json');
        $json_data = json_decode($duplicate,TRUE);
        foreach($json_data as $item){
            if($login == $item['login']){
                if(md5($password) == $item["password"]){
                    $_SESSION['login1'] = True ;
                    $_SESSION['login1']=$item['login'];
                    setcookie($login,$login,time()+3600,"/home",'localhost',TRUE,FALSE);
                    return 1;
                    //login successfully
                }else{
                    return 10;
                    //wrong password
                }
            }

        }
        return 100;
            // user dosenot registered
    }

        
    
}

class Select {
    public function selectbyid($login){
        $duplicate =file_get_contents('data.json');
        $json_data = json_decode($duplicate,TRUE);
        foreach($json_data as $item){
            if($login == $item['login']){
                return $item;
            }
            
        }
         
    }
}


    

class CRUD{
     
    public function read_data(){
       
        $index = 0;
        $data = file_get_contents('data.json');
        $data = json_decode($data);
        foreach($data as $row){
            echo"<tr>
                <td>$row->login</td>
                <td>$row->password</td>
                <td>$row->confirm_password</td>
                <td>$row->email</td>
                <td>$row->name</td>
                <td>
                    <a href='edit.php?index=".$index."' class='btn btn-success btn-sm'>Edit</a>
                    <a href='delete.php?index=".$index."' class='btn btn-danger btn-sm'>Delete</a>
                </td>
            </tr>";
            $index++;
        }
        
    }

    public function edit_data(){
        $index=$_GET['index'];
        $data = file_get_contents('data.json');
        $data_array = json_decode($data);
        $row = $data_array[$index];
        if(isset($_POST['save'])){
            $input=array(
                'login'=>$_POST['login'],
                'password'=>$_POST['p1'],
                'confirm_password'=>$_POST['p2'],
                'email'=>$_POST['email'],
                'name'=>$_POST['name']
            );
            $data_array[$index] = $input;
            $data = json_encode($data_array,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            file_put_contents('data.json',$data); 
            header('location:index.php');  
        }
        return $row;
    }

    public function delete_data(){
        $index = $_GET['index'];
        $data = file_get_contents('data.json');
        $data = json_decode($data);
        unset($data[$index]);
        $data = json_encode($data,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('data.json',$data);
        header('location:index.php');  

    }
}
?>