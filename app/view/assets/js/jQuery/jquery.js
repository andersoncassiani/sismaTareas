$(document).ready(function() {
  $.ajaxSetup({
    cache: false
});
  mostrarDatos();

  $(document).on("click", ".btnEliminar", function() {
      let id = $(this).val();
      
      $.ajax({
          url: "app/view/tarea/eliminar.php",
          type: "POST",
          data: { id: id },
          dataType: "json",
          success: function(response) {
              let respuesta = JSON.parse(response);
              
              if (respuesta === 0) {
             
              mostrarDatos();
            }
          },
          error: function(xhr, status, error) {
              console.error("Error en la petición AJAX:", status, error);
          }
      });
  });

  $(document).on("change", ".form-check-input", function() {
    let id = $(this).val();
    let isChecked = $(this).prop("checked");
    let arreglo = id.split("/");
    id = arreglo[0];
    estado = arreglo[1];
    // Realizar la acción deseada según si el checkbox está marcado o no
    if (isChecked) {
      
        // El checkbox se ha marcado
        // AID:", id);quí puedes realizar cualquier acción adicional que necesites
        $.ajax({
          url: "app/view/tarea/actualizar.php",
          type: "POST",
          data: { id: id, estado: estado }, 
          dataType: "json",
          success: function(response) {
              let respuesta = JSON.parse(response);
              
              
           if (respuesta === 0) {
             
              mostrarDatos();
            }
          
          },
          error: function(xhr, status, error) {
              console.error("Error en la petición AJAX:", status, error);
            }
  });

    } else {
        // El checkbox se ha desmarcado
        // Aquí puedes realizar cualquier acción adicional que necesites
        $.ajax({
          url: "app/view/tarea/actualizar.php",
          type: "POST",
          data: { id: id, estado: estado }, 
          dataType: "json",
          success: function(response) {
              let respuesta = JSON.parse(response);
              
              
             if (respuesta === 0) {
             
              mostrarDatos();
            }
           
          },
          error: function(xhr, status, error) {
              console.error("Error en la petición AJAX:", status, error);
            }
  });

    }
})

  $("#formAgregar").submit(function (e) { 
      e.preventDefault();
      let tarea = $("#tarea").val();
      
      $.ajax({
          url: "app/view/tarea/agregar.php",
          type: "POST",
          data: { tarea: tarea },
          dataType: "json",
          success: function(response) {
              let respuesta = JSON.parse(response);
              if (respuesta === 1) {
                  $("#tarea").val("");
                  mostrarDatos();
              }
          },
          error: function(xhr, status, error) {
              console.error("Error en la petición AJAX:", status, error);
          }
      });
  });

  function mostrarDatos(){
      $.ajax({
        url: "app/view/tarea/tabla.php?timestamp=" + new Date().getTime(),
          type: "GET",
          dataType: "html",
          success: function(response) {
              $("#tablaContent").html(response);
          },
          error: function(xhr, status, error) {
              console.error("Error en la petición AJAX:", status, error);
          }
      });
    
  }
});