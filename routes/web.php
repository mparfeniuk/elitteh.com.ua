<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index', ["name" => "ООО «Элиттех-Украина»"]);
});

Route::get('kz-25', function () {
    return view('kz25', ["name" => "Зерноочистительный комплекс КЗ-25"]);
});

Route::get('kz-50', function () {
    return view('kz50', ["name" => "Зерноочистительный комплекс КЗ-50"]);
});

Route::get('bcs25', function () {
    return view('bcs25', ["name" => "Сепараторы виброцентробежные БЦС-25"]);
});


Route::get('bcs50', function () {
    return view('bcs50' , ["name" => "Сепараторы виброцентробежные типа БЦС-50"]);
});

Route::get('sad', function () {
    return view('sad', ["name" => "Сепаратор-аэродинамический типа САД"]);
});

Route::get('ovs-25', function () {
    return view('ovs25', ["name" => "Очиститель вороха самопередвижной ОВС-25"]);
});

Route::get('b32-o', function () {
    return view('b32o', ["name" => "Скальператор барабанный А1-БЗ2-О"]);
});

Route::get('dryers_for_wood', function () {
    return view('dryers_for_wood', ["name" => "Зерносушилки на дровах"]);
});

Route::get('norii', function () {
    return view('norii', ["name" => "Нории"]);
});

Route::get('snu-550', function () {
    return view('snu550', ["name" => "Стогометатель-погрузчик навесной универсальный СНУ-550"]);
});

Route::get('pku-08', function () {
    return view('pku08', ["name" => "Погрузчик фронтальный универсальный ПКУ-0.8"]);
});

Route::get('pbm-800', function () {
    return view('pbm800', ["name" => "ПБМ-800"]);
});

Route::get('zm-100', function () {
    return view('zm100', ["name" => "Зернометатель ЗМ «Евро-100»"]);
});

Route::get('zm-60', function () {
    return view('zm60', ["name" => "Зернометатель самопередвижной ЗМ-60А"]);
});

Route::get('kshp', function () {
    return view('kshp', ["name" => "Самоходные ковшовые шнековые погрузчики Р6-КШП"]);
});

Route::get('in_action/{id}', function ($postId) {
    $id = (int)$postId;
    $action_array = [
        1 => ["name" => "Поднятие ЗАВ", "amount" => 17, "folder" => "podjemyzav"],
        3 => ["name" => "Реконструкция ЗАВ", "amount" => 11, "folder" => "rekonstrukcyja_zav"],
        4 => ["name" => "Перенос ЗАВ", "amount" => 3, "folder" => "perenos_zav"],
        7 => ["name" => "Строительство ЗАВ-50", "amount" => 11, "folder" => "stroitelstvo_zav/1"],
        8 => ["name" => "Строительство ЗАВ-25", "amount" => 5, "folder" => "stroitelstvo_zav/2"],
        9 => ["name" => "Строительство ЗАВ с сепаратором САД", "amount" => 6, "folder" => "stroitelstvo_zav/3"],
        10 => ["name" => "Зерносушительный комплекс", "amount" => 9, "folder" => "stroitelstvo_zav/4"],
        11 => ["name" => "Сушка", "amount" => 5, "folder" => "sushka"],
        12 => ["name" => "Установка ОБВ", "amount" => 7, "folder" => "ustanovka_obv"],
        13 => ["name" => "Установка сепаратора САД", "amount" => 7, "folder" => "ustanovka_sad"],
    ];

    if(array_key_exists($postId, $action_array)){
        return view('gallery', [
            'id' => $id,
            'name' => $action_array[$id]["name"],
            'amount' => $action_array[$id]["amount"],
            'folder' => $action_array[$id]["folder"]
            ]);
    } else {
        return view('404', ["name" => "Страница не найдена"]);
    };


});



