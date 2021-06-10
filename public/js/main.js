$(document).ready(function() {

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

    // Modal Editar PErmisos

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

    $(document).on('click', "#editbtn-rol", function() {
      $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
  
      var options = {
        // 'backdrop': 'static'
      };
      $('#editmodal-rol').modal(options)
    })
  
    // on modal show
    $(document).on('click', '#editbtn-rol', function() {
      fila = $(this).closest("tr");
      // id = parseInt(fila.find("td:eq(0)").text());
       namerol = fila.find("td:eq(1)").text();
       permisos1 = fila.find("td:eq(2)").text();
       arraypermisos = permisos1.split(',');

      $(arraypermisos).each(function() {

        // SI EL ROL NO TIENE NINGUN PERMISO ASIGNADO
        if (arraypermisos == '') 
          {
            $('input:checkbox').attr('checked','checked');
            $(this).val('uncheck all');
            $(arraysinespacion).prop("checked", false);

          }

        // SI EL ROL TIENE ALGUN PERMISO ASIGNADO
        else 
          {
            arraypermisos1 = '#' + arraypermisos.join(',#');    
            arraysinespacion = arraypermisos1.split(' ').join('');
            $(arraysinespacion).prop("checked", true);
          }
      })

      $(".modal-header").css("background-color", "#ffed4a");
      $(".modal-header").css("color", "black");
      $("#Erol-name").val(namerol);
      
  
    })
  
    // on modal hide
    $('#editmodal-rol').on('hide.bs.modal', function() {
      $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
      $("#editform-rol").trigger("reset");
    })




    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

    // Modal Crear PErmisos

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    $(document).on('click', "#createbtn-rol", function() {
      $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
  
      var options = {
        // 'backdrop': 'static'

      };
      $('#createmodal-rol').modal(options)
    })
  
    // on modal show
    $(document).on('click', '#createbtn-rol', function() {
      $(".modal-header").css("background-color", "#007bff");
      $(".modal-header").css("color", "white");
  
    })
  
    // on modal hide
    $('#createmodal-rol').on('hide.bs.modal', function() {
      $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
      $("#createform-rol").trigger("reset");
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