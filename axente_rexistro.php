<?php

header('Content-Type: text/html; charset=UTF-8');
echo "<pre>";print_r($_REQUEST); echo "<pre/>";

$nomeCompleto=htmlspecialchars(trim(strip_tags($_REQUEST['nomeCompleto'])), ENT_QUOTES, "ISO-8859-1");
if ($nomeCompleto == "")
    print "<p>O campo nome completo está baleiro</p>";
else
    print "<p>O valor recibido do campo nome é: $nomeCompleto</p>";

/*********************************************************************************************/
$nome_Usr=htmlspecialchars(trim(strip_tags($_REQUEST['nome_Usr']), ENT_QUOTES, "ISO-8859-1"));
if ($nome_Usr == "")
    print "<p>O campo nome de usuario está baleiro. É un campo obrigatorio.</p>";
else
    print "<p>O valor recibido o campo nome de ususario é: $nome_Usr</p>";

/*********************************************************************************************/
$contrasinal=htmlspecialchars(trim(strip_tags($_REQUEST['contrasinal'])), ENT_QUOTES, "ISO-8859-1");
if ($contrasinal == "")
    print "<p>O campo contrasinal está baleiro. É un campo obrigatorio.</p>";
elseif (strlen($_POST['contrasinal'])<6) {
    print "<p>Ingrese unha contrasinal de mínimo 6 caracteres</p>";
}
else
    print "<p>O valor recibido do campo contrasinal é: $contrasinal</p>";

/*********************************************************************************************/
$idade=htmlspecialchars(trim(strip_tags($_REQUEST['idade'])), ENT_QUOTES, "ISO-8859-1");
if ($idade == "")
    print "<p>O campo idade está baleiro.</p>";
elseif (($_POST['idade']<0) || ($_POST['idade']>130)) {
    print "<p>Hai que incluir un número entre 0 e 130</p>";
}
else
    print "<p>O valor recibido do campo idade é: $idade</p>";

/*********************************************************************************************/
//O campo data de nacemento deberá conter unha data no formato dd/mm/aaaa.
$dNac=htmlspecialchars(trim(strip_tags($_REQUEST['dNac'])), ENT_QUOTES, "ISO-8859-1");
//$fecha="**/**/****";
if ($dNac == "")
    print "<p>O campo data de nacemento está baleiro</p>";

if ($dNac != "")
$valores = explode('/',$dNac);

if(count($valores) == 3){
    if (checkdate($valores[1],$valores[0],$valores[2]))
    print "<p>Formato de data correcto</p>";
    else 
    print "<p>Algún dos valores non é válido.</p>";
}else {
    print "<p>A data introducida non ten un formato válido.</p>";
}


/*********************************************************************************************/
//O campo email deberá conter un enderezo válido.
$email=htmlspecialchars(trim(strip_tags($_REQUEST['email'])), ENT_QUOTES, "ISO-8859-1");
if ($email == "")
    print "<p>O campo email está baleiro. É un campo obrigatorio</p>";
elseif($_POST['email'] == '' or !preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$_POST['email'])){

        print "<p>Email introducido no válido</p>";
}    
else
    print "<p>O valor recibido do campo email é: $email</p>";

/*
$email = "john.doe@example.com";

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo("$email is a valid email address");
} else {
  echo("$email is not a valid email address");
}
*/

/*********************************************************************************************/
//O campo URL da páxina persoal deberá conter unha URL válida.
$url=htmlspecialchars(trim(strip_tags($_REQUEST['url'])), ENT_QUOTES, "ISO-8859-1");
$validar_url=$_REQUEST['url'];
if ($url == "")
    print "<p>O campo URL da páxina persoal está balerio</p>";
elseif($_POST['url']== '' or !preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|](\.)[a-z]{2}/i",$_POST['url'])){
    print "<p>URL introducida incorrecta</p>";
}

else
    print "<p>O valor recibido do campo URL da páxina persoal é: $url</p>";
    
/*
$url = "https://www.w3schools.com";

if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo("$url is a valid URL");
} else {
    echo("$url is not a valid URL");
}
*/

/*********************************************************************************************/
//O campo IP do equipo deberá conter unha dirección IP válida.
$ip=htmlspecialchars(trim(strip_tags($_REQUEST['ip'])), ENT_QUOTES, "ISO-8859-1");
$ip=$_POST['ip'];
if ($ip == "")
    print "<p>O campo IP do equipo está baleiro</p>";
elseif(filter_var($ip, FILTER_VALIDATE_IP)){
    print "<p>O valor recibido do campo IP é: $ip</p>";

}
else
    print "<p>Formato IP incorrecto</p>";

/*********************************************************************************************/
$hobbies=htmlspecialchars(trim(strip_tags($_REQUEST['hobbies'])), ENT_QUOTES, "ISO-8859-1");
if ($hobbies == "")
    print "<p>O campo descrición dos hobbies está baleiro</p>";
else
    print "<p>O valor recibido do campo hobbies é: $hobbies</p>"; 

/*********************************************************************************************/
$rcbInfo=(isset($_REQUEST['rcbInfo']))
    ? htmlspecialchars(trim(strip_tags($_REQUEST['rcbInfo'])), ENT_QUOTES, "ISO-8859-1")
    : "";
if ($rcbInfo == "")
    print "<p>Non se utilizou o control recibir información.</p>";
else
    print "<p>O valor recibido do control recibir información é: $rcbInfo</p>";

/*********************************************************************************************/
$sexo= (isset($_REQUEST['sexos']))
    ? htmlspecialchars(trim(strip_tags($_REQUEST['sexos'])), ENT_QUOTES, "ISO-8859-1")
    : "";
if ($sexo == "")
    print "<p>Non se utilizou o control sexo. É obrigatorio.</p>";
else
    print "<p>O valor recibido do control sexo é: $sexo</p>";

/*********************************************************************************************/
$linguasEs= (isset($_REQUEST['linguasEs']))
    ? $_REQUEST['linguasEs']
    : "";
if ($linguaEs == "")
    print "<p>Non se utilizou o control linguas estranxeiras.</p>";
else
    echo "Os valores recibidos do menú linguas estranxeiras son: <pre>";
    print_r($linguasEs);
    echo "</pre>";

/*********************************************************************************************/
$curriculo= (isset($_REQUEST['curriculo']))
    ? $_FILES['curriculo']
    : "";
if ($curriculo == "")
    print "<p>Non se utilizou o control curriculo.</p>";
else{
    echo "<p>O nome e o tamaño do arquivo recibido no campo currículo son:".$curriculo["name"]." e ".$curriculo["size"]."bytes</p>";
    move_uploaded_file($curriculo["tmp_name"], "subidos/".$curriculo["name"]);
}

?>