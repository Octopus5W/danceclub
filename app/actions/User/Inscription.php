<?php
if($action==="inscription" && !empty($_POST) && isset($_POST)){
    //tableau qui donne les condition a verifier pour chaque champ
    $errors = Form($_POST,[
        "name"=> ["required", "max:255"],
        "surname"=> ["required", "max:255"],
        "birthday"=> ["required", "max:255"],
        "email"=> ["required", "max:255"],
        "username"=> ["required", "max:255"],
        "password"=> ["required", "max:255"],
        "password_check"=> ["required", "max:255"],
    ]);
    
    if(empty($errors)) {
        $data = formValidation($_POST);
        // check si c'est un email valide
        if (filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
                    // verifier si l'email est pris
            $user = getUserByEmail($data['email']);
            if(!$user) {
                // verifier si les mot de passe sont correspondent
                if($data["password"]===$data["password_check"]){
                    $data['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
                    addUser($data);
                    $user = getUserByEmail($data['email']);
                    $_SESSION['user'] = $user[0];

                    header("location: index.php?logged");
                }
                else{
                    $errors['password'][] = "Les mots de passe doivent etre identique";
                }
            } else {
                $errors['email'][] = "Adresse email déjà prise";
            }

        }else{
            $errors['email'][] = "Email non valide";
        }
    } 

}
?>