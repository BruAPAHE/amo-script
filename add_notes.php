<?php
include "cUrls.php";
function add_common()
    {
        $element = $_GET['element_id1'];
        $id = $_GET['introduced_id1'];
        $text = $_GET['text'];
        $data = [
            'add' => [
                0 => [
                    'element_id' => $id,
                    'element_type' => $element,
                    'note_type' => '4',
                    'text' => $text,
                ],
            ],
        ];
        Send_amo('notes',$data);
    }
function add_call()
{

    $ss = $_GET['element_id2'];
    $element = $_GET['introduced_id2'];
    $notes['add'] = [
        [
            'element_id' => $element,
            'element_type' => $ss,
            'note_type' => 10,
            'params' => [
                'UNIQ' => '676sdfs7fsdf',
                'LINK' => 'www.testweb.ru/test_call.mp3',
                'PHONE' => '84950000001',
                'DURATION' => 0,
                'SRC' => 'asterisk',
                'call_status' => '3' //статус
            ]
        ]
    ];

    Send_amo('notes',$notes);
}

if (isset($_GET['buttom_1'])) {
    add_common();
}
if (isset($_GET['buttom_2'])) {
    add_call();
}
header("Location:notes.php");