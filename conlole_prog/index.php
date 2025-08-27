<?php

//$array = mb_str_split('абсолютно любая фраза');
/*$result = [];
foreach ($array as $value) {
    if (!isset($result[$value])) {
        $result[$value] = 0;
    }
    $result[$value]++;
}
ksort($result);
foreach ($result as $key => $value) {
    //var_dump(empty(trim($key)));
    $keyy = empty(trim($key)) ? 'пробел' : $key;
    echo $keyy . ': ' . $value . PHP_EOL;
}*/

class Class1
{
    protected array $array;
    public function __construct(protected string $string)
    {
        $this->array = mb_str_split($this->string);
    }

    public function run(): void
    {
        $result = [];
        foreach ($this->array as $value) {
            if (!isset($result[$value])) {
                $result[$value] = 0;
            }
            $result[$value]++;
        }
        ksort($result);
        echo 'фраза "' . $this->string . '" содержит:' . PHP_EOL;
        foreach ($result as $key => $value) {
            //var_dump(empty(trim($key)));
            $keyy = empty(trim($key)) ? 'Пробел' : $key;
            echo $keyy . ': ' . $value . PHP_EOL;
        }
    }
}

$class1 = new Class1('абсолютная фраза');
$class1->run();