$(function() {
    $('.finish_btn').click(function(){
        
        var task_id = $(this).data('id');
        $finish_btn = $(this);

        if($(this).hasClass('finished')){
            action = 'unfinish';
        }else{
            action = 'finish'
        }

        $.ajax({
            url: "index.php",
            type: 'post',
            data:{
                'finish': action,
                'task_id': task_id
            },
            success: function(data){
                if(action == 'finish'){
                    $finish_btn.addClass('finished');
                }else{
                    $finish_btn.removeClass('finished');
                }
            }
        })
    })


    $('.delete_btn').click(function(){
        
        var dialog = confirm("Delete a task?");
        if (dialog == true) {

            var task_id = $(this).data('id');
            $delete_btn = $(this);

            $.ajax({
                url: "index.php",
                type: 'post',
                data:{
                    'delete_btn': 1,
                    'task_id': task_id
                },
                success: function(data){
                    $delete_btn.closest('tr').remove();
                }
            })
        } 
    })
});