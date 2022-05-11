<?php
include_once '../nav_bar/nav_bar.php';
function search_item($code_inventario)
{
    include '../conexion.php'; 
    $sql = 'SELECT * FROM items WHERE code_inventario = ?';
    $query = $pdo -> prepare($sql);
    $query->execute(array($code_inventario));
    $resultado = $query->fetch(); 
    return  $resultado;
}

function editar_item($name,$description,$code_inventario,$id)
{
    # code...
    if($code_inventario){
        include '../conexion.php'; 
        $sql = 'UPDATE items SET name = :name, description = :description, code_inventario = :code_inventario WHERE items.id = ?';
        $query = $pdo -> prepare($sql);
        $data = [
            ':name' => $name,
            ':description' => $description,
            ':code_inventario' => $code_inventario,
            ':id' => $id,
        ];
        $query_executed = $query->execute($data);	  
    
    
        if($query_executed){
            echo '<script>alert("Se ha editado correctamente")</script>';
          
        }else{
            echo '<script>alert("ERROR ! EL EQUIPO NO SE HA PODIDO MODIFICAR")</script>';
        }

    }else{
        include '../conexion.php'; 
        $sql = 'UPDATE items SET name = :name , description = :description WHERE items.id = :id';
        $query = $pdo -> prepare($sql);
        $data = [
            ':name' => $name,
            ':description' => $description,
            ':id' => $id,
        ];
        $query_executed = $query->execute($data);	  
    
    
        if($query_executed){
            echo '<script>alert("Se ha editado correctamente")</script>';
          
        }else{
            echo '<script>alert("ERROR ! EL EQUIPO NO SE HA PODIDO MODIFICAR")</script>';
        }
    }
    

}
$item_to_edit = search_item($_GET['ed']);

if($item_to_edit){
    var_dump($item_to_edit["code_inventario"]);
    //MOSTRAMOS EL FORMULARIO PARA EDITAR EL ITEM
    include_once 'form_editar.php';
    //AHora recogemos los datos y los enviamos a la db

}
if(isset($_POST['code_inventario'])){
    if($_POST['code_inventario'] == $item_to_edit['code_inventario']){
        echo "LOS CODIGOS DE INVENTARIO SON IGUALES";
        //Si son iguales no modificamos el codigo y solo vamos a modificar los atributos descricition y nombre
        editar_item($_POST['marca_modelo'] , $_POST['description_item'], false , $item_to_edit['id']);
     
     }else{
        echo "LOS CODIGOS DE INVENTARIO SON DIFERENTES, POR ELLO SE INTENTARA EDITAR TAMBIEN EL CODIGO DE INVETARIO";
        editar_item($_POST['marca_modelo'] , $_POST['description_item'], $_POST['code_inventario'] , $item_to_edit['id']);
     
    }
}
