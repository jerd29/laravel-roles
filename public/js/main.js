$(document).ready(function() {

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

    // Modal Editar PErmisos

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

    $(document).on('click', "#editbtn-permisos", function() {
      $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
  
      var options = {
        // 'backdrop': 'static'
      };
      $('#editmodal-permisos').modal(options)
    })
  
    // on modal show
    $(document).on('click', '#editbtn-permisos', function() {
      fila = $(this).closest("tr");
      // id = parseInt(fila.find("td:eq(0)").text());
       namepermiso = fila.find("td:eq(1)").text();
      $(".modal-header").css("background-color", "#ffed4a");
      $(".modal-header").css("color", "black");
      // console.log(namepermiso);
      $("#Epermiso-name").val(namepermiso);
  
    })
  
    // on modal hide
    $('#editmodal-permisos').on('hide.bs.modal', function() {
      $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
      $("#editform-permisos").trigger("reset");
    })




    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

    // Modal Crear PErmisos

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    $(document).on('click', "#createbtn-permisos", function() {
      $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
  
      var options = {
        // 'backdrop': 'static'

      };
      $('#createmodal-permisos').modal(options)
    })
  
    // on modal show
    $(document).on('click', '#createbtn-permisos', function() {
      $(".modal-header").css("background-color", "#007bff");
      $(".modal-header").css("color", "white");
  
    })
  
    // on modal hide
    $('#createmodal-permisos').on('hide.bs.modal', function() {
      $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
      $("#createform-permisos").trigger("reset");
    })



    //Borrar
  $(document).on("click", "#deletebtn-permisos", function () {
    fila = $(this);
    id = parseInt($(this).closest("tr").find("td:eq(0)").text());
    permiso = $(this).closest("tr").find("td:eq(1)").text();
    var respuesta = confirm("¿Está seguro de eliminar el Permiso " + permiso + "?");
    console.log(respuesta);
      // if (respuesta) {
      //   $.ajax({
      //     url: "../include/user/crud_user.php",
      //     type: "POST",
      //     datatype: "json",
      //     data: { opcion: opcion, id: id },
      //     success: function (data) {
      //       tabla_dep.ajax.reload(null, false);
      //       alertify.success("eliminado con exito!");
      //     },
          // success: function() {
          // tablacc = $('#tabla').load('./include/tablacc.php');
          // console.log(data);
          // }
      //     });
      //   }
  });

})