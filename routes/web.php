<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('A/dashboard', [DashboardController::class, 'WebIndex'])->name('Dashboard.WebIndex');

Route::get('/', function () {
    return view('welcome');
});

// level_0
Route::get('/level_0', function () {
    $x = 17;
    $y = 8;
    echo($x + $y).'<br>'; # 25
    echo($x - $y).'<br>'; # 9
    echo($x * $y).'<br>'; # 136
    echo($x / $y).'<br>'; # 2.125
    echo($x % $y).'<br>'; # 1
});
// level_1
Route::get('/level_1', function () {
    $a = "Hello";
    $b = $a . "world";
    echo $b . '<br>'; // Hello world
    $x = "Hello";
    $x .= "world";
    echo $x . '<br>';  // Hello world
});
// level_2’
Route::get('/level_2', function () {
    $x = 17;
    $y = '17';
    echo ($x == $y) . '<br>'; # true 為 1
    echo intval($x === $y) . '<br>'; # false 為空白
    echo ($x != $y) . '<br>'; # false 為空白
    echo ($x !== $y) . '<br>'; # true 為 1
    $a = 17;
    $b = 8;
    echo ($a > $b) . '<br>'; # true 為 1
    echo ($a < $b) . '<br>';# false 為空白
});
// level_3’
Route::get('/level_3', function () {
    $t = date("H");
    $d = date("w");
    if ($t == '13') echo '現在時間';
    dd($t);
});
// level_4
Route::get('/level_4', function () {
    $t = date("H");
    if ($t == "20") {
        echo "等於 20";
    } else {
        echo "不等於 20";
    }
});
// level_5
Route::get('/level_5', function () {
    $t = date("H");
    if ($t == "20") {
        echo "等於 20";
    } else if ($t < "15") {
        echo "小於 15";
    } else {
        echo "未知";
    }
});
// level_6(類似階梯圖中SFC)
Route::get('/level_6', function () {
    $a = 1234; //case值:0或"0"
    switch ($a){
        case 1:
            echo '是 1';
            break;
        case 12:
            echo '是 12';
            break;
        case 123:
            echo '是 123';
            break;
        default:
            echo '都不是';
    }
});
// level_7
Route::get('/level_7', function () {
    $x = 1;
    while ($x <= 5) {
        echo "這個數字是: " . $x . '<br>';
        $x++;
    }
});
// level_8()最少會執行一次
Route::get('/level_8', function () {
    $x = 1;
    do {
        echo "這個數字是: " . $x . '<br>';
        $x++;
    } while ($x <= 5);
});
// level_9(起始; 條件; 累加)
Route::get('/level_9', function () {
    for ($i = 0; $i < 10; $i++) {
        echo "數字是: " . $i . '<br>';
    }
});
// level_10
Route::get('/level_10', function () {
    $colors = array('red', 'green', 'blue', 'yellow');
    foreach ($colors as $key => $value) {
        echo $key.'#'.$value . '<br>';
    }
});
// level_11
Route::get('/level_11', function () {
    function sayHi() {
        echo "Hello world";
    }
    sayHi();
});
// level_12
Route::get('/level_12', function () {
    function Familyname($fname){
        echo "$fname ZZZ.<br>";
    }
    Familyname('Li');
    Familyname('Hong');
    Familyname('Tao');
    Familyname('Xaio Mei');
    Familyname('Jian');
});
// level_13
Route::get('/level_13', function () {
    function Familyname($fname, $year){
        echo "$fname ZZZ. $year<br>";
    }
    Familyname('Li', 2012);
    Familyname('Hong', 12);
    Familyname('Tao', 32);
    Familyname('Xaio Mei', 11);
    Familyname('Jian', 42);
});
// level_14
Route::get('/level_14', function () {
    function setHeight($minheight=50){
        echo "高度: $minheight <br>";
    }
    setHeight(250);
    setHeight();
});
// level_15
Route::get('/level_15', function () {
    function sum($x, $y){
        $z = $x + $y;
        return $z;
    }
    echo "5 + 10 = " . sum(5, 10) . '<br>';
    echo "7 + 13 = " . sum(7, 13) . '<br>';
    echo "2 + 4 = " . sum(2, 4) . '<br>';
});
// level_16
Route::get('/level_16', function () {
    $cars = array('Porsche', 'BMW', 'Volvo');
    echo "想買 $cars[0] <br>";
});
// level_17
Route::get('/level_17', function () {
    $cars = array('Porsche', 'BMW', 'Volvo');
    echo "數量: " . count($cars) . '<br>';
});
// level_18
Route::get('/level_18', function () {
    $age = array('Bill' => 63, 'Steve' => 56, 'Elon' => 47);
    echo "Elon is " . $age['Elon'].' years old.';
});
// level_19
Route::get('/level_19', function () {
    $Cars = array('Porsche', 'BMW', 'Volvo');
    $arrIndex = count($Cars);
    for ($i = 0; $i < $arrIndex; $i++) {
        echo $Cars[$i] . '<br>';
    }
});
// level_20
Route::get('/level_20', function () {
    $age = array('Bill' => 63, 'Steve' => 56, 'Elon' => 48);
    foreach ($age as $key => $value) {
        echo "Key=" . $key . ", Value=" . $value . '<br>';
    }
});
// level_21
Route::get('/level_21', function () {
    $cars = array('Porsche', 'BMW','Volvo');
    sort($cars);
    dd($cars);
});
// level_22
Route::get('/level_22', function () {
    $cars = array('Porsche', 'BMW','Volvo');
    rsort($cars);
    dd($cars);
});
// level_999
Route::get('/level_999', function () {
    echo strlen('Hello world!');
});
// level_998(檢查句子中文字)
Route::get('/level_998', function () {
    echo strpos('Hello world!', 'world');
});
// level_997
Route::get('/level_997', function () {
    echo str_replace("world", "Kitty", "Hello world!"); // 輸出Hello Kitty!

});
// level_996(has)
Route::get('level_996', function () {
    $collection = collect(['account_id' => 1, 'product' => 'Desk', 'Name'=> 'Document']);
    dd($collection->has('Name')); // true
});
// level_996_1
Route::get('level_996_1', function () {
    $collection = collect(['account_id' => 1, 'product' => 'Desk', 'Name'=> 'Document']);
    dd($collection->has('age')); // false
});
// level_995(isEmpty)
Route::get('level_995', function () {
    dd(collect([])->isEmpty()); // true
});
// level_995_1
Route::get('level_995_1', function () {
    dd(collect(['account_id' => 1, 'product' => 'Desk', 'Name'=> 'Document'])->isEmpty()); //false
});
// level_994(map)
Route::get('level_994', function () {
    $collection = collect([1, 2, 3, 4, 5]);
    $multiplied = $collection->map(function ($item, $key) {
        return $item * 2;
    });
    dd($multiplied->all()); // [2, 4, 6, 8, 10]
});
// level_993(push)
Route::get('level_993', function () {
    $collection = collect([1, 2, 3, 4]);
    $collection->push(5);
    dd($collection->all()); // [1, 2, 3, 4, 5]
});
