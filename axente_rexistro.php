<?php

header('Content-Type: text/html; charset=UTF-8');
echo "<pre>";print_r($_REQUEST); echo "<pre/>";

$nomeCompleto=htmlspecialchars(trim(strip_tags($_REQUEST['nomeCompleto'])), ENT_QUOTES, "ISO-8859-1");
if ($nomeCompleto == "")
    print "<p>O campo nome completo está baleiro</p>";
else
    print "<p>O valor recibido do campo nome é: $nomeCompleto</p>";


$nome_Usr=htmlspecialchars(trim(strip_tags($_REQUEST['nomeUsr']), ENT_QUOTES, "ISO-8859-1"));
if ($nome_Usr == "")
    print "<p>O campo nome de usuario está baleiro. É un campo obrigatorio.</p>";
else
    print "<p>O valor recibido o campo nome de ususario é: $nomeUsr</p>";

$contrasinal=htmlspecialchars(trim(strip_tags($_REQUEST['contrasinal'])), ENT_QUOTES, "ISO-8859-1");
if ($contrasinal == "")
    print "<p>O campo contrasinal está baleiro. É un campo obrigatorio.</p>";
elseif (strlen($_POST['contrasinal'])<6) {
    print "<p>Ingrese unha contrasinal de mínimo 6 caracteres</p>";
}
else
    print "<p>O valor recibido do campo contrasinal é: $contrasinal</p>";


$idade=htmlspecialchars(trim(strip_tags($_REQUEST['idade'])), ENT_QUOTES, "ISO-8859-1");
if ($idade == "")
    print "<p>O campo idade está baleiro.</p>";
else
    print "<p>O valor recibido do campo idade é: $idade</p>";


$dNac=htmlspecialchars(trim(strip_tags($_REQUEST['dNac'])), ENT_QUOTES, "ISO-8859-1");
if ($dNac == "")
    print "<p>O campo data de nacemento está baleiro</p>";
else
    print "<p>O valor recibido do campo data de nacemento é: $dNac</p>";


$email=htmlspecialchars(trim(strip_tags($_REQUEST['email'])), ENT_QUOTES, "ISO-8859-1");
if ($email == "")
    print "<p>O campo email está baleiro. É un campo obrigatorio</p>";
else
    print "<p>O valor recibido do campo email é: $email</p>";


$url=htmlspecialchars(trim(strip_tags($_REQUEST['url'])), ENT_QUOTES, "ISO-8859-1");
if ($url == "")
    print "<p>O campo URL da páxina persoal está balerio</p>";
else
    print "<p>O valor recibido do campo URL da páxina persoal é: $url</p>";


$ip=htmlspecialchars(trim(strip_tags($_REQUEST['ip'])), ENT_QUOTES, "ISO-8859-1");
if ($ip == "")
    print "<p>O campo IP do equipo está baleiro</p>";
else
    print "<p>O valor recibido do campo IP é: $ip</p>";


$hobbies=htmlspecialchars(trim(strip_tags($_REQUEST['hobbies'])), ENT_QUOTES, "ISO-8859-1");
if ($hobbies == "")
    print "<p>O campo descrición dos hobbies está baleiro</p>";
else
    print "<p>O valor recibido do campo hobbies é: $hobbies</p>"; 


$rcbInfo=(isset($_REQUEST['rcbInfo']))
    ? htmlspecialchars(trim(strip_tags($_REQUEST['rcbInfo'])), ENT_QUOTES, "ISO-8859-1")
    : "";
if ($rcbInfo == "")
    print "<p>Non se utilizou o control recibir información.</p>";
else
    print "<p>O valor recibido do control recibir información é: $rcbInfo</p>";



$sexo= (isset($_REQUEST['sexos']))
    ? htmlspecialchars(trim(strip_tags($_REQUEST['sexos'])), ENT_QUOTES, "ISO-8859-1")
    : "";
if ($sexo == "")
    print "<p>Non se utilizou o control sexo. É obrigatorio.</p>";
else
    print "<p>O valor recibido do control sexo é: $sexo</p>";


$linguasEs= (isset($_REQUEST['linguasEs']))
    ? $_REQUEST['linguasEs']
    : "";
if ($linguaEs == "")
    print "<p>Non se utilizou o control linguas estranxeiras.</p>";
else
    echo "Os valores recibidos do menú linguas estranxeiras son: <pre>";
    print_r($linguasEs);
    echo "</pre>";



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