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
    });
  
    // on modal show
    $(document).on('click', '#editbtn-rol', function() {
      fila = $(this).closest("tr");
      id = parseInt(fila.find("td:eq(0)").text());
       namerol = fila.find("td:eq(1)").text();
       permisos1 = fila.find("td:eq(2)").text();
       arraypermisos = permisos1.split(',');
       $("#erolform").trigger("reset");


      $(arraypermisos).each(function() {

        // SI EL ROL NO TIENE NINGUN PERMISO ASIGNADO
        if (arraypermisos == '') 
          {
            $('input:checkbox').attr('checked','checked');
            $(this).val('uncheck all');
            // $(arraysinespacio).prop("checked", false);

          }

        // SI EL ROL TIENE ALGUN PERMISO ASIGNADO
        else 
          {
            arraypermisos1 = '#' + arraypermisos.join(',#');    
            arraysinespacio = arraypermisos1.split(' ').join('');
            $(arraysinespacio).prop("checked", true);
          }
      });

      $(".modal-header").css("background-color", "#ffed4a");
      $(".modal-header").css("color", "black");
      $("#Erol-name").val(namerol);
      
  
    });
  
    // on modal hide
    $('#editmodal-rol').on('hide.bs.modal', function() {
      $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
      $("#erolform").trigger("reset");
    });




    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

    // Modal Crear PErmisos

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    $(document).on('click', "#createbtn-rol", function() {
      $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
      $("#rolform").trigger("reset");
      
      id=null;

      var options = {
        // 'backdrop': 'static'

      };
      $('#createmodal-rol').modal(options)
    });
  
    // on modal show
    $(document).on('click', '#createbtn-rol', function() {
      $(".modal-header").css("background-color", "#007bff");
      $(".modal-header").css("color", "white");
  
    });
  
    // on modal hide
    $('#createmodal-rol').on('hide.bs.modal', function() {
      $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
      $("#createform-rol").trigger("reset");
    });



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

  //submit para el Alta y Actualización
  $("#rolform").submit(function (e) {
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    rolname = $.trim($("#Erol-name").val());
    idrol = id;
    let _token   = $('meta[name="csrf-token"]').attr('content');

    // Toma todos los ids de cada checkbox
    var listaValoresCheckboxes = $("input[type='radio']:checked").map(function () {
      return this.value;
     }).get();

     permisos = listaValoresCheckboxes;

    console.log(permisos);
    console.log(rolname);
    // console.log(id);
    if(rolname == "") {
      $('#mensaje_np').fadeIn();
      return false;
    }

    $.ajax({
      url: "/laravel-roles/public/rolform",
      type: "POST",
      datatype: "json",
      data: { idrol: idrol, permisos: permisos, _token: _token, rolname:rolname },
      success: function (data) {
        alertify.success("Actualizado");
        location.reload();
        // $("#rolform")[0].reset();

        // console.log(data);
      },

      error: function (data) {
        // alertify.error("Fallo en el Registro");
        // table.ajax.reload(null, false);
        console.log('Error');
      },
    });
    $("#modalCRUD_CC").modal("hide");
  });

    //submit para la Actualización
    $("#erolform").submit(function (e) {
      e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
      rolnameid = $.trim($("#Erol-name").val());
      rolname = fila.find('td:eq(1)').text();
      idrol = id;
      let _token   = $('meta[name="csrf-token"]').attr('content');
  
      // Toma todos los ids de cada checkbox
      var listaValoresCheckboxes = $("input[type='radio']:checked").map(function () {
        return this.value;
       }).get();
  
       permisos = listaValoresCheckboxes;
  
      console.log(permisos);
      console.log(rolname);
      // console.log(id);

      if(rolname == "") {
        $('#mensaje_np').fadeIn();
        return false;
      }
  
      $.ajax({
        url: "/laravel-roles/public/rolform",
        type: "aa",
        datatype: "json",
        data: { idrol: idrol, permisos: permisos, _token: _token, rolname:rolname },
        success: function (data) {
          alertify.success("Actualizado");
          location.reload();
          // $("#rolform")[0].reset();
  
          // console.log(data);
        },
  
        error: function (data) {
          // alertify.error("Fallo en el Registro");
          // table.ajax.reload(null, false);
          console.log('Error');
        },
      });
      $("#modalCRUD_CC").modal("hide");
    });

});