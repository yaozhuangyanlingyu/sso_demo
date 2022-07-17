<?php

require_once './vendor/autoload.php';

use Casbin\Enforcer;

$e = new Enforcer("config/basic_model.conf", "config/basic_policy.csv");

// 判断用户"alice"是否有"data1"的读权限
$sub = "alice"; // the user that wants to access a resource.
$obj = "data1"; // the resource that is going to be accessed.
$act = "read"; // the operation that the user performs on the resource.

if ($e->enforce($sub, $obj, $act) === true) {
    echo "permit alice to read data1\n";
} else {
    echo "deny the request, show an error\n";
}

/*
// 判断用户拥有不同资源的权限
var_dump($e->enforce("alice", "data1", "read"));    // bool(true)
var_dump($e->enforce("alice", "data1", "write"));   // bool(false)
var_dump($e->enforce("bob", "data2", "read"));      // bool(false)
var_dump($e->enforce("bob", "data2", "write"));     // bool(true)
*/

var_dump(
    $e->getAllSubjects(),       // 输出所有主体
    $e->getAllObjects(),        // 输出所有对象
    $e->getAllActions()         // 输出所有动作
);


