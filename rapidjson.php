<?php
$json = file_get_contents("test.json");
echo('json.len = '.strlen($json)."\n");

$times = 1000;
var_dump($json);
//$r = new Rapidjson();
$json = '{"a":"b"}';
$r = new Rapidjson();
$r->parse($json);
var_dump($r['name']);
var_dump($r['city']);
exit;
////////////////////////////////////////

$start_time = microtime(true);
$start_mem =  memory_get_usage();

for($i = 0; $i < $times; $i++) {
    $r = new Rapidjson($json);
}

$end_time = microtime(true);
$end_mem =  memory_get_usage();

echo "Rapidjson.time: " . ($end_time - $start_time)."\n";
echo "Rapidjson.mem: " . ($end_mem - $start_mem)."\n";


/////////////////////////////////////

$start_time = microtime(true);
$start_mem =  memory_get_usage();

for($i = 0; $i < $times; $i++) {
    $r = json_decode($json);
}
$end_time = microtime(true);
$end_mem =  memory_get_usage();

echo "json_decode.time: " . ($end_time - $start_time)."\n";
echo "json_decode.mem: " . ($end_mem - $start_mem)."\n";


?>
