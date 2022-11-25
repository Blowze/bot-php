<?php
$token = "5786247684:AAFA8vXmT01gUGU39QzVYGChGg7s1O81lB8"; // тут вводим ваш токен;
$chat_id = "1742040870"; // указываем идентификатор группового чата
$lead_name=$_GET['name']; //получает методом GET название лида, ответственного, источник и его идентификатор;
$lead_respons=$_GET['respons'];
$lead_source=$_GET['source'];
$lead_link=$_GET['link'];
$lead_link1 = "https://crm.ext.team.bitrix24.ru/crm/lead/show/$lead_link/"; // данную конструкцию мы используем для того, чтобы корректно сформировать и отправить ссылку на лида в Telegram;
#Оправляем в телеграм
$hello = "<b>Здравствуйте, коллеги!</b>"; // формируем элементы массива (сообщения), который будем отправлять в сторону Telegram – API;
$hello_1 = "";
$message = "В CRM Битрикс24 добавлен новый лид -  ";
$repons = "Ответственный - ";
$src= "Источник - ";
$link = "Ссылка - ";
$arr = array( // формируем сам массив;
$hello => $hello_1,
$message => $lead_name,
$repons => $lead_respons,
$src => $lead_source,
$link => $lead_link1,
);
foreach($arr as $key => $value) {
if ($key == "Ссылка - ") { $txt .= "".$key." ".$value."%0A";} else {
$txt .= "".$key." ".$value."%0A";
}};
fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r"); // отправляем данные в сторону API Телеграма;
?>
