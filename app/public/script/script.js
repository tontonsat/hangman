$(document).ready(function(){
    $('#btnAddSelectModule').click(function(){
        $('.selectModulesRow').clone(true,true).removeClass('selectModulesRow').appendTo('.selectModulesGroupCopy');
    });
});
