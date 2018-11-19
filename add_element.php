<?php
require_once "cUrls.php";
$number = $_GET["name5"];

function funcEntity($number,$element,$arr)
{
    $arr_common = [];
    $data['add'] = [];


    for ($i = 1; $i <= $number; $i++) {
        if ($element == 'leads') {
            $masEmptity = [
                'name' => 'Сделка' . $i,
                'contacts_id' => $arr[$i - 1]
            ];
        } else if ($element == 'companies') {
            $masEmptity = [
                'name' => 'Компания' . $i
            ];
        }
        if ($element == 'contacts') {
            $masEmptity = [
                'name' => 'Контакт' . $i,
                'company_id' => $arr[$i - 1]
            ];
        } else if ($element == 'customers') {
            $masEmptity = [
                'name' => 'Покупатель' . $i,
                'next_date' => '1542980340',
                'contacts_id' => $arr[$i - 1]
            ];
        }
        array_push($data['add'], $masEmptity);
        if ($i % 250 == 0 or $i % $number == 0) {
            $arrIdEmptity = funcSend($data, $element);
            $arr_common = array_merge($arr_common, $arrIdEmptity);
            $data['add'] = [];
        };
    };


    return $arr_common;
}
function funcSend($data,$method)
{

    global $user;
    var_dump($user);
    $link = "https://apahe.amocrm.ru/api/v2/".$method.'?'.http_build_query($user);;

    $headers[] = "Accept: application/json";

    //Curl options
    $curl = curl_init($link);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_USERAGENT, "amoCRM-API-client-
undefined/2.0");
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_HEADER,false);
    $out = curl_exec($curl);
    curl_close($curl);
    var_dump($out);
    $result = json_decode($out, TRUE);
    for ($i=0;$i<count($data['add']);$i++) {
        $result2[$i]=$result['_embedded']['items'][$i]['id'];
    };

    return $result2;

};

set_time_limit(300);

$arrCompany=funcEntity($number,'companies',[2]);
$arrContacts=funcEntity($number,'contacts',$arrCompany);
$arrCustomers=funcEntity($number,'customers',$arrContacts);
$arrLeads=funcEntity($number,'leads',$arrContacts);
header('Location:elements.php');

