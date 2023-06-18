<?php

// Function which prints "Hello I am Bob"
// function hello()
// {
//     echo 'Hello I am Bob<br>';
// }

// hello();


// Function with argument

function hello($name)
{
   echo "Hello I am $name";
}
hello('Bob');
echo '<br>';
// Create sum of two functions
function sum($a, $b)
{
    return $a + $b;
}

echo sum(4,5);
echo '<br>';
echo sum(9,10);
echo '<br>';

// Create function to sum all numbers using ...$nums
function sum1(...$nums)
{
   $sum = 0;
   foreach ($nums as $num) $sum += $num;
   return $sum;
}
echo sum1(1, 2, 3, 4, 6);

//Arrow functions
function sum2(...$nums)
{
   return array_reduce($nums, fn($carry, $n) => $carry + $n);
}
echo sum2(1, 2, 3, 4, 6);

