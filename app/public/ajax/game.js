$(document).ready(function(){

    $.ajax({
        url: 'app/public/ajax/game/gameController.php',
        type: 'get',
        data: {init: 1,
            },
        success: function(data){
            console.log('ajax get game ok');
            console.log(data);
            // obj = JSON.parse(data);
            // $('.game').html(obj.value1);
            $('.game').append(data);
        }
    });

    // $(document).on("click", "#resetModuleBtn", function(){
    //
    //     $.ajax({
    //         url: 'app/public/ajax/module.php',
    //         type: 'post',
    //         data: {reset: 1,
    //             },
    //         success: function(data){
    //             console.log('ajax flush ok');
    //             $('#SessionModules').html(data);
    //         }
    //     });
    // });
    //
    // $('#addModuleBtn').click(function(){
    //
    //     var idModule =   $("#ModulesSessionSelect").val();
    //     var daysModule =  $("#daysModule").val();
    //
    //     var nameModule = $('#'+idModule).data('namemodule');
    //
    //     console.log(idModule);
    //     console.log(daysModule);
    //     console.log(nameModule);
    //
    //     $.ajax({
    //         url: 'app/public/ajax/module.php',
    //         type: 'post',
    //         data: {id_module: idModule,
    //                 days_module: daysModule,
    //                 name_module: nameModule
    //             },
    //         success: function(data){
    //             console.log('ajax add ok');
    //             $('#SessionModules').html(data);
    //         }
    //     });
    // });
    //
    // $(document).on("click", ".removeModuleBtn", function(){
    //     let keyModule = $(this).data('keymodule');
    //     console.log(keyModule);
    //
    //     $.ajax({
    //         url: 'app/public/ajax/module.php',
    //         type: 'post',
    //         data: {keyModule: keyModule,
    //                 delete: 1
    //             },
    //         success: function(data){
    //             console.log('ajax delete ok');
    //             $('#alert').html("<div class='alert alert-success alert-dismissible fade show' role='alert'>Module supprimé avec succès. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
    //
    //             $("#SessionModules").fadeOut(100, function(){
    //                 $(this).html(data);
    //             }).fadeIn(100);
    //         }
    //     });
    // });

});
