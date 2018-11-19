<?php
include "cUrls.php";
function add_field_mult()
{
    global  $Response;
    $val = $_GET['val'];
    $name = $_GET['mul'];

    $fields = [
        'add' => [
            0 => [
                'name' => $name,
                'type' => '5',
                'element_type' => '1',
                'origin' => 'qwer',
                'enums' => [
                    0 => $val[0],
                    1 => $val[1],
                    2 => $val[2],
                    3 => $val[3],
                    4 => $val[4],
                    5 => $val[5],
                    6 => $val[6],
                    7 => $val[7],
                    8 => $val[8],
                    9 => $val[9],
                ],
            ],
        ],
    ];
    Send_amo('fields',$fields);

    global $id_field;
    $id_field = $Response["_embedded"]['items'][0]['id'];
    $Response = $Response['_embedded']['items'];
    $output = 'ID добавленных полей:' . PHP_EOL;
    var_dump($id_field);
    foreach ($Response as $v)
        if (is_array($v))
            $output .= $v['id'] . PHP_EOL;
    return $output;
}
function all_value_fild()
{
    global $Response;
    global $id_field;
    Send_amo('account?with=custom_fields');
    global $arr;
    $a = $Response['_embedded']['custom_fields']['contacts'][$id_field]['enums'];
    $arr = array_keys($a);
    var_dump($a);
    // $Response = $Response[0];

}
function accaunt()
{
    global $Response;

    Send_amo('contacts');

    $Response = $Response['_embedded']['items'];

    global $first_names;

    $first_names = array_column($Response, 'id');

}
function randome()
{
    if (isset($_GET['subb']) and isset($_GET['val'])) {
        global $arr;
        global $first_names;
        global $id_field;

        for ($i = 0; $i < count($first_names); $i++) {
            $str = ['', '', '', '', '', '', '', '', '', ''];
            $array = array_merge($arr, $str);
            shuffle($array);
            $data = [
                'update' => [
                    0 => [
                        'id' => $first_names[$i],
                        'updated_at' => time(),
                        'custom_fields' => [
                            0 => [
                                'id' => $id_field,
                                'values' => [
                                    0 => $array[0],
                                    1 => $array[1],
                                    2 => $array[2],
                                    3 => $array[3],
                                    4 => $array[4],
                                    5 => $array[5],
                                    6 => $array[6],
                                    7 => $array[7],
                                    8 => $array[8],
                                    9 => $array[9],
                                ],
                            ],
                        ],
                    ],
                ],
            ];
            Send_amo( "contacts",$data);
        }
    }
}



add_field_mult();
all_value_fild();
accaunt();
randome();
header('Location:add_field.php');
