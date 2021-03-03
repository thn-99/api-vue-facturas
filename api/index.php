<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
// if(empty($_SERVER['CONTENT_TYPE']))
// { 
//  $_SERVER['CONTENT_TYPE'] = "application/x-www-form-urlencoded"; 
// }
require_once __DIR__ . '/../Repository/ClienteRepository.php';


$method = $_SERVER['REQUEST_METHOD'];
$uri = basename($_SERVER['REQUEST_URI']);
$entity = getEntityManager();
$clienteRepository = new ClienteRepository();

  echo "method: ".$method;
  echo "uri: ".$uri;
 var_dump($_GET);
 var_dump($_POST);


if (strpos($uri, "?")) {
    $uri = substr($uri, 0, strpos($uri, "?"));
}

switch ($uri) {
    case '':

        break;

    case 'cliente':
        switch ($method) {
            case 'GET':
                if (checkGetParam("nif")) {
                    echo json_encode($clienteRepository->getClienteByNif($_GET["nif"]));
                }
                break;

            case 'POST':
                $objeto = new stdClass();
                if (checkGetParam("cliente")) {
                    $k = preg_replace('/\s+/', '', $_GET["cliente"]);
                    $jsonData = json_decode($k, true);
                    var_dump($jsonData);
                    if (isset($jsonData["id"])) {
                        $cliente = $entity->find("Cliente", $jsonData["id"]);
                        $cliente->updateSelf($jsonData["NIF"], $jsonData["codigoPostal"], $jsonData["razonsocial"], $jsonData["direccion"], $jsonData["poblacion"], $jsonData["provincia"], $jsonData["correo"], $jsonData["telefono"]);
                    } else {
                        $cliente = new Cliente($jsonData["id"], $jsonData["NIF"], $jsonData["codigoPostal"], $jsonData["razonsocial"], $jsonData["direccion"], $jsonData["poblacion"], $jsonData["provincia"], $jsonData["correo"], $jsonData["telefono"]);
                    }
                    $entity->persist($cliente);
                    try {
                        $entity->flush();
                        echo true;
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                }


                break;

            case 'DELETE':
                //var_dump($_GET);
                try {
                    $clienteRepository->deleteById(intval($_GET["id"]));
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
                break;

            default:
                //error
                break;
        }
        break;
    case 'clientes':
        echo json_encode($entity->getRepository("Cliente")->findAll());
        break;
    case 'facturas':
        echo json_encode($entity->getRepository("Factura")->findAll());
        break;
    case 'factura':
        switch ($method) {
            case 'POST':
                if(checkGetParam("factura") && checkGetParam("idCliente")){
                    //
                }
                break;
            
            default:
                # code...
                break;
        }
    default:
        //
    break;
}

// if($method == "POST"){
//     $mensaje=new stdClass();
//     $mensaje->estado=true;
//     $mensaje->mensaje="accedido por post";
// }elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
//     $mensaje=new stdClass();
//     $mensaje->estado=true;
//     $mensaje->mensaje="accedido por Get";
// }
// echo json_encode($mensaje);

function checkPostParam($paramName)
{
    if (isset($_POST[$paramName])) {
        return true;
    } else {
        echo false;
        return false;
    }
}

function checkGetParam($paramName)
{
    if (isset($_GET[$paramName])) {
        return true;
    } else {
        echo false;
        return false;
    }
}
