<?php
function TraductField($key){
    switch ($key) {
        case 'name':
            return 'nom';
            break;
        case 'surname':
            return 'prénom';
            break;
        case 'username':
            return 'nom d\'utilisateur';
            break;
        case 'password':
            return 'mot de passe';
            break;
        case 'password_check':
            return 'confirmation du mot de passe';
            break;
        case 'content':
            return 'contenu';
            break;
        default:
            return $key;
            break;
    }
}

function Form($request, $rules)
{
    $error = [];
    foreach ($rules as $field => $rule_array) {
        foreach ($rule_array as $rule) {
            switch ($rule) {
                case 'required':
                    if (!isset($request[$field]) || empty($request[$field])) {
                        $error[$field][] = 'Le champ ' . TraductField($field) . ' est requis';
                    }
                    break;
                case 'max:255':
                    if (strlen($request[$field]) > 255) {
                        $error[$field][] = 'Le champ ' . TraductField($field) . ' peut contenir au maximum 255 caractères';
                    }
                    break;
                    case 'max:10':
                        if (strlen($request[$field]) < 10) {
                            $error[$field][] = 'Le champ ' . TraductField($field) . ' doit contenir au maximum 10 caractères';
                        }
                        break;
                case 'min:10':
                    if (strlen($request[$field]) < 10) {
                        $error[$field][] = 'Le champ ' . TraductField($field) . ' doit contenir au minimum 10 caractères';
                    }
                    break;
                case 'min:5':
                    if (strlen($request[$field]) < 5) {
                        $error[$field][] = 'Le champ ' . TraductField($field) . ' doit contenir au minimum 5 caractères';
                    }
                    break;
            }
        }
    }
    return $error;
}
function formValidation($data) {
    foreach($data as $item) {
        $item = htmlspecialchars(stripslashes(trim($item)));
    }
    
    return $data;
}


function displayErrors($errors) {
	if(is_array($errors)) {
		foreach($errors as $error) {
			echo "<div style='color:red'>$error</div>";
		}
	} else {
		echo "<div style='color:red'>$errors</div>";
	}
}