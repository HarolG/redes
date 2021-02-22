$(document).ready(function () {
    listaTareas()

    const BtnAdd = $('#btn_agregar')

    $(BtnAdd).click(function (e) { 
        e.preventDefault();

        const postData = new FormData($('#formAdd')[0])

        $.ajax({
            type: "POST",
            url: "../php/agregarTarea.php",
            data: postData,
            contentType: false,
            processData: false,
            success: function (response) {
                alert(response)
                $('#formAdd').trigger('reset');
                listaTareas()
            }
        });
    });

    function listaTareas() {
        $.get("../php/listaTareas.php",
            function (response) {
                const tasks = JSON.parse(response);
                let plantilla = ''
                tasks.forEach(task => {
                    plantilla += `
                    <tr taskId="${task.id}">
                        <td>${task.id}</td>
                        <td>${task.nombre}</td>
                        <td>${task.descripcion}</td>
                        <td><a href="${task.archivo}">${task.archivo}</a></td>
                        <td>
                            <button class="task-rate">Calificar</button>
                            <button class="task-delete">Borrar</button>
                        </td>
                    </tr>`
                    
                });

                $('#tasks').html(plantilla);
            }
        );
    }

    $(document).on('click', '.task-delete', (e) => {
        if(confirm('¿Estás seguro de eliminar esta tarea?')) {
          const element = $(this)[0].activeElement.parentElement.parentElement;
          const id = $(element).attr('taskId');
          
          $.post("../php/borrarTarea.php", {id},
              function (response) {
                  alert(response)
                  listaTareas()
              }
          );
        }
      });

    $(document).on('click', '.task-rate', (e) => {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('taskId');

        $.post("../php/mostrarCali.php", {id},
              function (response) {
                  alert(response)
              }
          );
    });
});