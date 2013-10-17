YSMS-Sudoku
===========

Yet Another Sudoku Maker &amp; Solver

Use PHP & Golang
@author ciogao@gmail.com


-------------------------------------
###PHP 
####make new sudoku by a tpl
```conf
php ./php/MakerTest.php


 3  2  9  4  7  5  6  8  1  
 7  4  1  3  6  9  2  5  2  
 8  5  6  1  2  1  9  4  3  
 2  6  4  1  9  8  7  3  5  
 5  9  3  2  1  4  8  6  4  
 1  7  8  5  4  3  2  9  4  
 6  3  2  8  5  7  4  1  9  
 4  1  5  9  3  4  2  7  6  
 9  8  7  1  4  6  5  2  6  

 □  2  □  □  □  5  □  8  □  
 □  4  1  □  6  9  2  □  □  
 □  5  □  □  □  1  □  4  3  
 2  □  4  □  9  8  □  □  5  
 □  9  □  □  1  □  □  6  □  
 1  □  □  □  □  3  2  □  4  
 6  3  □  8  □  □  □  1  □  
 □  □  5  9  3  □  2  7  □  
 □  8  □  1  □  □  □  2  □  
```
####solver some sudoku code
```conf
 php ./php/SolverTest.php
 
 1  5  2  3  4  6  7  9  8  
 9  4  7  5  8  2  6  1  3  
 3  8  6  9  1  7  4  5  2  
 7  9  1  8  3  4  5  2  6  
 5  3  4  6  2  9  1  8  7  
 2  6  8  7  5  1  9  3  4  
 4  7  3  1  9  8  2  6  5  
 8  2  9  4  6  5  3  7  1  
 6  1  5  2  7  3  8  4  9  

 5  1  6  2  7  4  3  9  8  
 7  9  3  5  6  8  4  1  2  
 8  2  4  3  9  1  7  6  5  
 4  5  1  6  3  7  2  8  9  
 3  7  2  1  8  9  6  5  4  
 9  6  8  4  5  2  1  3  7  
 2  3  5  8  4  6  9  7  1  
 6  4  9  7  1  5  8  2  3  
 1  8  7  9  2  3  5  4  6  
```

