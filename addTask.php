<?php
//conexión
try{
$comm = new PDO('mysql:host=localhost;dbname=todo_list','root','');
}catch(PDOException $e) {
    echo "Error connection:".$e->getMessage();
}

//recepcionar los datos de completado de la base de datos. Vamos a usar el name del input checkbox (task_check)
//si task_check existe le ponemos un 1 y sino un 0
//arriba tiene los dos valores, hace la actualización, el prepare, y le pasa el valor de task_check(completada) y del id
if(isset($_POST['id'])){

    $id=$_POST['id'];
    $task_check=(isset($_POST['task_check']))?1:0;
    $sql="UPDATE tasks SET completada=? WHERE id=?";
    $judgment= $comm->prepare($sql);
    $judgment->execute([$task_check, $id]); 
   
}

//si se presiona el botón que recoja los datos del imput(envió algo), que valide el envío y que lo imprima
//si extiste algo"isset", agregar tarea usando el name del imput del botón(add_task)
//vamos a almacenar el valor de la task del index.php en la variable $tasks
if(isset($_POST['add_task'])){
   
    $task=($_POST['task']);
//inserta en la tabla stacks el valor del campo tarea los valores y el valor que está aquí (?)
    $sql='INSERT INTO tasks (tarea) VALUE(?)';
//conectar con la base de datos y preparar para insertar la sql  
    $judgment= $comm->prepare($sql);
//ejecutar la sentencia
    $judgment->execute([$task]);
}
//borrar datos
//si envían un id eso es que quieren borrar, almacenalo en la variable $id, ejecuta la orden sql cuando id sea igual a algo
//ejecuta pasando el id y elimínalo dentro de la base de datos
//al tener debajo una orden de selección se muestran los registros y se borran
if(isset($_GET['id'])){

    $id=$_GET['id'];
    $sql="DELETE FROM tasks WHERE id=?";
    $judgment= $comm->prepare($sql);
    $judgment->execute([$id]); 
}

//solicitar los datos de la base de datos (ejecutar la instucción de selección)
$sql="SELECT * FROM tasks";
//ejecutar la instrucción con conexión query y se va a almacenar en ($results) que es el vamos a leer
$records=$comm->query($sql);



?>