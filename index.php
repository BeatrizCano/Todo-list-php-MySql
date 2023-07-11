<?php  include('addTask.php');?>
<!doctype html>
<html lang="en">

<head>
  <title>Todo List PHP</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!--estilos para subrayar la tarea cuando esté lista--> 
  <style>
    .underlined{ text-decoration:line-through;}
  </style> 

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main class="container">
  <br/>  
  <div class="card">
    <div class="card-header">
        TODO LIST
    </div>
    <div class="card-body">
       
       

         <div class="mb-3">
            <form action="" method="post">   
                <label for="task" class="form-label">Task:</label>
                <input type="text"
                    class="form-control" name="task" id="task" 
                    aria-describedby="helpId" 
                    placeholder="Write your task">
                </br>
                <input 
                    name="add_task" 
                    id="add_task" class="btn btn-primary" 
                    type="submit" 
                    value="Add task">
            </form>
         </div>       

        <ul class="list-group">

        <?php
            //leer todos los registros de uno en uno y los almacena en $record(resultados individuales).
            // El bucle termina arriba y la parte de enmedio no tiene programación
            //las tareas que aparecen son las dos que están en la base de datos y así las pasamos a la lista
            //para mostrar el contenido, usamos la variable $record donde está almacenado el valor <?php echo $record['tarea'];
            //recorre la lista en bucle y añade los valores nuevos del campo "tarea" del formulario a los que ya estaban
            //son listas dinámicas
            //colocamos una etiqueta <a></a> para redirigir el id que está leyendo del registro del foreach y permite hacer click al botón y aparece el id en la barra de navegación
            foreach($records as $record) {?>
          
            <li class="list-group-item"> 
                
            <form action="" method="post">
                <!--se crea el imput para poder utlizar y actualizar el id. Se le pone hidden para que esté oculto ese valor -->
                <input type="hidden" name="id" value=" <?php echo $record['id'];?>">
                 <!--si está terminada la tarea se pone el check si no no-->
                 <!--añadir evento onchange para que cuando haya un cambio envie el fomulario. Y añadir un valor a value de 0/1 desde la base de datos--> 
                 <input class="form-check-input float-start" 
                    type="checkbox" 
                    name="task_check"
                    value="<?php echo $record['completada'];?>" 
                    id=""
                    onChange="this.form.submit()"
                    <?php echo ($record['completada']==1)?'checked':''; ?>>  
                <!--validar si se ha completado la tarea llamando al campo de la tabla de la base de datos "completada". 1 está completada-->
                <!--si record está completado y es igual a 1 subrayado(.underlined) sino nada-->                               

            </form>
               
                <span 
                    class="float-start 
                    <?php echo ($record['completada']==1)?'underlined':''; ?> ">
                    &nbsp;
                    <?php echo $record['tarea'];?>
                </span>
                <h6 class="float-start">
                   
                    &nbsp; <a href="?id=<?php echo $record['id'];?>"><span class="badge bg-danger">X</span></a> 
                </h6>
            </li>    
            
        <?php }?>

        </ul>

    </div>
    <div class="card-footer text-muted">
       
    </div>
  </div>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>