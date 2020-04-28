<?php
include '../../model/loginModel.php';

class LoginView extends LoginModel {
    private $error;
    private $arr=[];
    public function viewUserDetails($username, $password) {
        $getUserDetails = $this->authUser($username);

        if($getUserDetails) {
            $passFromDb = $getUserDetails['password'];
            if($passFromDb === $password) {
                // Get image
                $userImg= $getUserDetails['image'];
                $imagePath = 'https'. '://' . $_SERVER['HTTP_HOST'] . '/images/users/';
                $filePath = '../../../images/users/';
                if(file_exists($filePath . $userImg)) {
                   $userImgLoc = $imagePath . $userImg;
                } else {
                    $userImgLoc = null;
                }   

                $this->arr['firstname'] = $getUserDetails['firstname'];
                $this->arr['lastname'] = $getUserDetails['lastname'];
                $this->arr['username'] = $getUserDetails['username'];
                $this->arr['email'] = $getUserDetails['email'];
                $this->arr['address'] = htmlspecialchars($getUserDetails['address']);
                $this->arr['image'] = $userImgLoc;

                return json_encode([
                    "status" => true,
                    "message" => "User is Authenticated",
                    "data" => $this->arr
                ]);
                
            } else {
                $this->error = "Incorrect Password.";
            }
        } else {
            $this->error = "Incorrect Username.";
        }  

        return json_encode([
            "status" => false,
            "message" => $this->error,
            "data" => $this->arr
        ]);

    }
}