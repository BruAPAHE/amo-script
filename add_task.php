<?php
include "cUrls.php";
function task()
{
    $admin = $_GET['admin_id'];
    $element = $_GET['element_id'];
    $text = $_GET['text_task'];
    $id = $_GET['introduced_id'];

    $data = [
        'add' => [
            0 => [
                'element_id' =>  $id,
                'element_type' => $element,
                'complete_till' => time() + (7 * 24 * 60 * 60),
                'task_type' => '1',
                'text' => $text,
                'responsible_user_id' => $admin,
            ],
        ],
    ];
    Send_amo('tasks',$data);
}
function close(){
    $id = $_GET['id_task'];
    $data = [
        'update' => [
            0 => [
                'id' => $id,
                'updated_at' => time(),
                'text' => 'qwer',
                'is_completed' => '1',
            ],
        ],
    ];
    Send_amo('tasks',$data);
}
if (isset($_GET['buttom'])){
    task();
}
if(isset($_GET['buttom2'])){
    close();
}
header('Location:task.php');