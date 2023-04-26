<?php

/**
  * Retorna el valor de [] si està establert, en cas contrari, retorna una cadena buida.
  *
  * @param nomcamp El nom del camp del qual voleu recuperar el valor.
  *
  * @return El valor de [] si està establert, en cas contrari, una cadena buida.
  */
function recollirdades($nomcamp)
{
    return isset($_POST[$nomcamp]) ? $_POST[$nomcamp] : "";
}

/**
  * Si la variable de sessió existeix, retorneu-la, en cas contrari retorneu 0.
  *
  * @param nomcamp El nom de la variable de sessió que voleu retornar.
  */
function returnSes($nomcamp)
{
    return isset($_SESSION[$nomcamp]) ? $_SESSION[$nomcamp] : 0;
}


/**
  * Estableix una variable de sessió.
  *
  * @param valor1 El nom de la variable de sessió.
  * @param valor2 El valor al qual voleu establir la sessió.
  */
function doSes($valor1, $valor2)
{
    $_SESSION["$valor1"] = $valor2;
}

/**
  * Es connecta a la base de dades.
  *
  * @param server El nom del servidor o l'adreça IP del servidor MySQL.
  * @param root d'usuari
  * @param passwd la contrasenya de l'usuari
  * @param namebbdd El nom de la base de dades a la qual voleu connectar-vos.
  *
  * @return Un objecte mysqli.
  */
function connectaBBDD($server, $user, $passwd, $namebbdd)
{
    $mysqli = new mysqli($server, $user, $passwd, $namebbdd);
    if (!$mysqli->connect_errno) {
        $mysqli->set_charset("utf8");
    } else {
        $mysqli = false;
    }
    return $mysqli;
}

/**
  * Retorna una funció de capçalera.
  *
  * @param header La capçalera a la qual voleu tornar.
  *
  * @return La funció returnHeaderFunction() està retornant la funció header().
  */
function returnHeaderFunction($header)
{
    return header("location:../../" . $header . "");
}

/**
  * Retorna una funció de capçalera amb un valor i estableix una variable de sessió.
  *
  * @param header La capçalera a la qual tornar.
  * @param error El número d'error
  *
  * @return S'està retornant la funció returnHeaderFunctionAndValue.
  */
function returnHeaderFunctionAndValue($header, $error)
{
    $_SESSION["errorNumero"] = $error;
    return header("location:../../" . $header . "");
}

/**
  * Estableix la variable de sessió al nombre passat.
  *
  * @param sessionName El nom de la variable de sessió que voleu establir.
  * @param num El número que voleu afegir a la sessió.
  *
  * @return El valor de la variable de sessió.
  */
function sessionFunction($sessionName, $num)
{
    return $_SESSION[$sessionName] = $num;
}

/**
  * Es necessita un objecte mysqli, un correu electrònic i una contrasenya
  *i retorna un objecte de resultat mysqli.
  *
  * @param mysqli L'objecte de connexió mysqli.
  * @param correu electrònic usuari@domini.com
  * @param contrasenya 123456
  *
  * @return Un objecte de resultat.
  */
function loginUser($mysqli, $email, $password)
{
    $sql = "SELECT * FROM " . _TABLESUSUARI . " WHERE mailuser = '" . $email . "' AND passworduser = '" . $password . "'";
    $result = $mysqli->query($sql);
    return $result;
}

/**
  * Insereix un nou usuari a la base de dades.
  *
  * @param mysqli L'objecte de connexió mysqli.
  * @param nameUserRegistration El nom de l'usuari
  * @param emailregister test@test.com
  *
  * @return El resultat de la consulta.
  */
function registerUser($mysqli, $nameUserRegistration, $emailregister)
{
    $sql = "INSERT INTO `user`(`iduser`, `nameuser`, `mailuser`, `passworduser`, `activeuser`) VALUES (NULL,'" . $nameUserRegistration . "','" . $emailregister . "','passworduser',0)";
    $result = $mysqli->query($sql);
    return $result;
}

/**
  * Pren un objecte mysqli i una adreça de correu electrònic i
  * retorna un objecte de resultat mysqli.
  *
  * @param mysqli L'objecte de connexió mysqli.
  * @param correu electrònic l'adreça de correu electrònic de l'usuari
  *
  * @return El resultat de la consulta.
  */
function recoverPass($mysqli, $email)
{
    $sql = "SELECT * FROM " . _TABLESUSUARI . " WHERE mailuser = '" . $email . "'";
    $result = $mysqli->query($sql);
    return $result;
}

/**
  * Envia un correu electrònic a l'usuari amb un codi aleatori.
  *
  * @param email L'adreça de correu electrònic a la qual voleu enviar el correu electrònic.
  * @param num el num per el missatge de correu.
  *
  * @return codiAleatori valor del codi .
  */
function sendMail($email,$num)
{
    $codiAleatori = bin2hex(random_bytes(10));
    $from = "geason@gmail.com";
    if($num == 0){
        $subject = "Confirmació de Registre de la pàgina Geason";
    }else{
        $subject = "Confirmació de Recuperació de Contrasenya de la pàgina Geason";
    }
    $message = "El teu codi de confirmació és: " . $codiAleatori;
    $headers = "De:" . $from;
    mail($email, $subject, $message, $headers);
    return $codiAleatori;
}

/**
  * Actualitza el codi de l'usuari.
  *
  * @param mysqli L'objecte de connexió mysqli
  * @param codi el codi que s'inserirà a la base de dades
  * @param mailuser l'adreça de correu electrònic de l'usuari
  *
  * @return El resultat de la consulta.
  */
function insertCode($mysqli, $code, $mailuser)
{
    $sql = "UPDATE " . _TABLESUSUARI . " SET  `codeuser`='" . $code . "' WHERE mailuser = '" . $mailuser . "'";
    $result = $mysqli->query($sql);
    return $result;
}

/**
  * Es necessita una connexió MySQLi, una adreça de correu electrònic i un nom de camp, per
  * retorna el valor pasat.
  *
  * @param mysqli L'objecte de connexió mysqli
  * @param email l'adreça de correu electrònic de l'usuari
  * Camp @param El camp que voleu seleccionar de la taula.
  *
  * @return El valor del camp.
  */
function selectUserInfoByEmail($mysqli, $email, $field)
{
    $sql = "SELECT $field FROM " . _TABLESUSUARI . " WHERE mailuser = '" . $email . "'";
    $result = $mysqli->query($sql);
    if ($result->num_rows != 0) {
        $row = $result->fetch_array();
    }
    return $row[$field];
}

/**
  * Es necessita la connexió de mysql, un identificador d'usuari i un nom de camp,
  *  per retornar el valor d'aquest camp.
  *
  * @param mysqli L'objecte de connexió mysqli
  * @param iduser L'identificador de l'usuari
  * @param el camp que voleu seleccionar
  *
  * @return El valor del camp.
  */
function selectUserInfoById($mysqli, $iduser, $field)
{
    $sql = "SELECT $field FROM " . _TABLESUSUARI." WHERE iduser = '" . $iduser . "'";
    $result = $mysqli->query($sql);
    if ($result->num_rows != 0) {
        $row = $result->fetch_array();
    }
    return $row[$field];
}