<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <p>Для работы с наборами данных предназначены массивы. Для создания массива применяется выражение <span class="b">new Array()</span>:</p>
        <pre class="brush:js;">
var myArray = new Array();
</pre>
        <p>Существует также более короткий способ инициализации массива:</p>
        <pre class="brush:js;">
var myArray = [];
</pre>
        <p>В данном случае мы создаем пустой массив. Но можно также добавить в него начальные данные:</p>
        <pre class="brush:js;">
var people = ["Tom", "Alice", "Sam"];
console.log(people);
</pre>
        <p>В этом случае в массиве myArray будет три элемента. Графически его можно представить так:</p>
        <table>
            <tr class="tabhead"><td>Индекс</td><td>Элемент</td></tr>
            <tr><td>0</td><td>Tom</td></tr>
            <tr><td>1</td><td>Alice</td></tr>
            <tr><td>2</td><td>Sam</td></tr>
        </table>
        <p>Для обращения к отдельным элементам массива используются индексы. Отсчет начинается с нуля, то есть первый элемент будет иметь индекс 0, а последний - 2:</p>
        <pre class="brush:js;">
var people = ["Tom", "Alice", "Sam"];
console.log(people[0]); // Tom
var person3 = people[2]; // Sam
console.log(person3); // Sam
</pre>
        <p>Если мы попробуем обратиться к элементу по индексу больше размера массива, то мы получим undefined:</p>
        <pre class="brush:js;">
var people = ["Tom", "Alice", "Sam"];
console.log(people[7]); // undefined
</pre>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>