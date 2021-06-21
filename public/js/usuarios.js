$(document).ready(function() {



    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

    // Modal Editar PErmisos

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

    $(document).on('click', "#editbtn-user", function() {
      $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
  
      var options = {
        // 'backdrop': 'static'
      };
      $('#editmodal-user').modal(options)
    });
  
    // on modal show
    $(document).on('click', '#editbtn-user', function() {
      fila = $(this).closest("tr");
      id = parseInt(fila.find("td:eq(0)").text());
       nameuser = fila.find("td:eq(1)").text();
       email = fila.find("td:eq(2)").text();
       roles = fila.find("td:eq(4)").text();
       $("#euserform").trigger("reset");
       $("#Euser-name").val(nameuser);
       $("#Euser-email").val(email);

        // $("#roles").val(roles);
        // $('#roles').find('option[text="'+roles+'"]').prop('selected', true);
        // $("#roles option:selected").text(roles);        
        // $("#roles option:selected").val(roles);
        // $("#roles option:selected").html();
        // $('#roles').find('option[text="admin"]').val();


       console.log(roles);

      $(".modal-header").css("background-color", "#ffed4a");
      $(".modal-header").css("color", "black");      
  
    });
  
    // on modal hide
    $('#editmodal-user').on('hide.bs.modal', function() {
      $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
      $("#euserform").trigger("reset");
    });



        //submit para la Actualización
        $("#euserform").submit(function (e) {
            e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página

            iduser = id;
      
            nameuser = $.trim($('#Euser-name').val());
            email = $.trim($('#Euser-email').val());  
            let _token   = $('meta[name="csrf-token"]').attr('content');

      
            if(nameuser == "") {
              $('#emensaje_np').fadeIn();
              return false;
            }
      
            if(email == "") {
                $('#emensaje_np').fadeIn();
                return false;
            }
      
              
            $.ajax({
              url: "/laravel-roles/public/updateUser",
              type: "post",
              datatype: "json",
              data: { iduser: iduser, nameuser: nameuser, email: email, _token: _token},
              success: function (data) {
                alertify.success("Actualizado");
                $("#euserform")[0].reset();
                location.reload();
        
                // console.log(namerol);
              },
        
              error: function (data) {
                alertify.error("Fallo en el Registro");
                // table.ajax.reload(null, false);
                console.log('Error');
              },
            });
            $("#modalCRUD_CC").modal("hide");
          });


});