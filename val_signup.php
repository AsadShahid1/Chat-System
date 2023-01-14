<?php
 include('db.php');
 $obj = new Database('batch' , 'chat_system');
    extract($_POST);
        if(isset($first) && !empty(trim($first))){
        if(isset($last) && !empty(trim($last))){
            if(isset($email) && !empty(trim($email))){
                if(isset($pwd) && !empty(trim($pwd))){
                    if(strpos($pwd," ")){
                        $response = [
                            'pass_match' => "error" ,
                            'msg' => "Don't space in between password"
                       ];
                     }
                    else{
                        if(isset($cpwd) && !empty(trim($cpwd))){
                            if(trim($pwd) == trim($cpwd)){
                                if(isset($phone) && !empty(trim($phone))){
                                    if (strpos($phone,"")){
                                        $response = [
                                            'phone_match' => "error" ,
                                            'msg' => "Don't space in between phone number"
                                       ];                                   
                                     }
                                    else{
                                        if (isset($country)&& !empty(trim($country))){
                                             if(isset($check)){
                                                 unset($_POST['submit']);
                                                 unset($_POST['cpwd']);
                                                 unset($_POST['check']);
                                                 if($obj->check('email' , $_POST['email'])){
                                                    $obj->insert($_POST);                         
                                                  
                                                }else{
                                                    $response = [
                                                        'match' => "error" ,
                                                        'msg' => "Email already exist"
                                                   ];
                                                 }
                                             }
                                             else{
                                                $response = [
                                                    'check' => "error" ,
                                                    'msg' => "Accept term & conditions first"
                                               ];                                           
                                              }
                                        }
                                        else{
                                            $response = [
                                                'country' => "error" ,
                                                'msg' => "Country is required"
                                           ];                                       
                                         }
                                    }
                                }else{
                                    $response = [
                                        'phone' => "error" ,
                                        'msg' => "Phone number is required"
                                   ];                                
                                }                               
                            }else{
                                $response = [
                                    'con_pwd' => "error" ,
                                    'msg' => "password & confirm password is not match :)"
                               ];
                           }
                        }else{
                            $response = [
                                'cpwd' => "error" ,
                                'msg' => "confirm password is required"
                           ];                       
                         }   
                    } 
                }else{
                    $response = [
                        'pwd' => "error" ,
                        'msg' => "password is required"
                   ];               
                 }    
            }else{
                $response = [
                    'email' => "error" ,
                    'msg' => "email is required"
               ];           
             }    
        }else{
            $response = [
                'last' => "error" ,
                'msg' => "Last Name is required"
           ];       
         }
    }else{
        $response = [
            'first' => "error" ,
            'msg' => " First Name is required"
       ];
    }


echo json_encode($response);

?> 