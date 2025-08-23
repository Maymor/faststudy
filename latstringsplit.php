<?php

class FrequencyAnalyzer {
    protected string $input;
    protected array $let;
    public function __construct() {
        echo 'Введите строку: ';
        $this->input = trim(fgets(STDIN)); //Ввод строки отпользователя
        $this->input = strtolower($this->input); //Приведение к нижнему регистру
        $this->input = preg_replace("/[^a-z]/", '', $this->input); //Фильтрация только по латинскому алфавиту в нижнем регистре
        $this->let = str_split($this->input); //Деление строки посимвольно в массив, запись результата в массив $this->let
    }

    public function run(): void //Основной блок кода, который выполняет всю парсировку массива и подсчёт, также выводит результат в читаемом виде
    {
        foreach ($this->let as $character) { //Цикл перебора массива
            if (!isset($result[$character])) { //Дословно: если не задан $result с ключём $character(буквой в этой фразе)
                $result[$character] = 0; //тогда создаём ключ и присваиваем значение 0 для счётчика.
            }
            $result[$character]++; //Увеличение значения счётчика на 1, при наличии буквы или её повторения
        }
        ksort($result); //Сортируем массив по алфавиту(по ключу в порядке возрастания)

        echo 'Анализ частоты повторения букв в строке "' . $this->input . '":' . PHP_EOL    ; //Вывод фразы
        foreach ($result as $let => $count) { //Цикл прогона массива с буквами
            echo $let . ': ' . $count . PHP_EOL; //Вывод каждой буквы с количеством повторений
        }
    }
}
//Запуск
$frequencyAnalyzer = new FrequencyAnalyzer(); //Создание экзепляра класса
$frequencyAnalyzer->run(); //Запуск метода run() в экземпляре класса FrequencyAnalyzer