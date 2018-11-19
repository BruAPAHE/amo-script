<?php
include "cUrls.php";

function test()
{
    $kek3 = $_GET['name'];
    $val = $_GET['type'];
    $data = [
        'add' => [
            0 => [
                'name' => $kek3,
                'type' => '1',
                'element_type' => $val,
                'origin' => 'qwer',
            ],
        ],
    ];
    Send_amo('fields',$data);

}
function accaunt(){

    global $Response;
    var_dump('test');
    Send_amo('account?with=custom_fields');

    $test = $Response['_embedded']['custom_fields']['contacts'];
    global  $first_names;
    $first_names = array_column($test, 'id','name');


}
function add_elements()
{
    $val = $_GET['type'];
    if ($val == 1) {
        $element = 'contacts';
    } elseif ($val == 2) {
        $element = 'leads';
    } elseif ($val == 3) {
        $element = 'companies';
    } elseif ($val == 12) {
        $element = 'costumers';
    } else
        echo "Введите коректную сущность";
    global $first_names;
    $id_element = $_GET['element_id'];
    $name = $_GET['name'];
    $value = $_GET['value'];
    if(array_key_exists($name,$first_names) == FALSE){
        test();
        accaunt();
        $data = [
            'update' => [
                0 => [
                    'id' => $id_element,
                    'updated_at' => time(),
                    'custom_fields' => [
                        0 => [
                            'id' => $first_names[$name],
                            'values' => [
                                0 => [
                                    'value' => $value,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    Send_amo($element, $data);
    }
    else if(array_key_exists($name,$first_names) == TRUE) {
        $data = [
            'update' => [
                0 => [
                    'id' => $id_element,
                    'updated_at' => time(),
                    'custom_fields' => [
                        0 => [
                            'id' => $first_names[$name],
                            'values' => [
                                0 => [
                                    'value' => $value,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
        Send_amo($element, $data);
    }
};




if(isset($_GET['tik'])){
    accaunt();
    add_elements();
}


header("Location:text.php");

