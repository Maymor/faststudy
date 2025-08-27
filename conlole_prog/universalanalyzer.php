<?php

class FrequencyAnalyzerFixed {
    protected string $input;
    protected array $let;
    public function __construct() {
        echo 'Введите строку: ';
        $this->input = trim(fgets(STDIN)); //Ввод строки от пользователя
        $this->let = mb_str_split($this->input); //Деление строки посимвольно в массив, запись результата в массив $this->let (В отличии от прошлого варианта mb_str_split позволяет обрабатывать кириллицу и unicode)
    }

    public function run(): void //Основной блок кода, который выполняет всю парсировку массива и подсчёт, также выводит результат в читаемом виде
    {
        $result = [];
        foreach ($this->let as $character) { //Цикл перебора массива
            if (!isset($result[$character])) { //Дословно: если не задан $result с ключом $character(буквой в этой фразе)
                $result[$character] = 0; //тогда создаём ключ и присваиваем значение 0 для счётчика.
            }
            $result[$character]++; //Увеличение значения счётчика на 1, при наличии буквы или её повторения
        }
        arsort($result); //Сортируем массив по частоте повторения символа (по значению по убыванию)

        echo 'Анализ частоты повторения букв в строке "' . $this->input . '":' . PHP_EOL    ; //Вывод фразы
        foreach ($result as $let => $count) { //Цикл прогона массива с буквами
            $space = empty(trim($let)) ? 'Пробел' : $let; //Если после затирки пробелов символ остаётся пустой, то выводим слово Пробел и также считаем их, в ином случае присваиваем значение $let
            echo $space . ': ' . $count . PHP_EOL; //Вывод каждой буквы с количеством повторений
        }
    }
}
//Запуск
$frequencyAnalyzerFixed = new FrequencyAnalyzerFixed(); //Создание экземпляра класса
$frequencyAnalyzerFixed->run(); //Запуск метода run() в экземпляре класса FrequencyAnalyzer
