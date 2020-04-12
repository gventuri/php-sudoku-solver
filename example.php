<?php
/*
* The function accepts one argument consisting of the 2D puzzle array, with the value 0 representing an unknown square.
* The Sudokus tested against this function can be "easy" (i.e. determinable; there will be no need to assume and test possibilities on unknowns) and are solved with a brute-force approach.
* For a better understanding of Sudoku rules, have a look at https://en.wikipedia.org/wiki/Sudoku
*
* 
* EXAMPLE:
* sudoku([
    [5,3,0,0,7,0,0,0,0],
    [6,0,0,1,9,5,0,0,0],
    [0,9,8,0,0,0,0,6,0],
    [8,0,0,0,6,0,0,0,3],
    [4,0,0,8,0,3,0,0,1],
    [7,0,0,0,2,0,0,0,6],
    [0,6,0,0,0,0,2,8,0],
    [0,0,0,4,1,9,0,0,5],
    [0,0,0,0,8,0,0,7,9]
  ]);  => [
    [5,3,4,6,7,8,9,1,2],
    [6,7,2,1,9,5,3,4,8],
    [1,9,8,3,4,2,5,6,7],
    [8,5,9,7,6,1,4,2,3],
    [4,2,6,8,5,3,7,9,1],
    [7,1,3,9,2,4,8,5,6],
    [9,6,1,5,3,7,2,8,4],
    [2,8,7,4,1,9,6,3,5],
    [3,4,5,2,8,6,1,7,9]
  ]
*/

require('./helpers/Sudoku.class.php');
require('./samples/samples.php');


/**
 * EXAMPLE
 * 
 * This will print:
 * [
 *   [5,3,4,6,7,8,9,1,2],
 *   [6,7,2,1,9,5,3,4,8],
 *   [1,9,8,3,4,2,5,6,7],
 *   [8,5,9,7,6,1,4,2,3],
 *   [4,2,6,8,5,3,7,9,1],
 *   [7,1,3,9,2,4,8,5,6],
 *   [9,6,1,5,3,7,2,8,4],
 *   [2,8,7,4,1,9,6,3,5],
 *   [3,4,5,2,8,6,1,7,9]
 * ] 
 * 
 */

$sample_data = $_SUDOKU_SAMPLES['first'];
$sudoku = new Sudoku($sample_data);
$solution = $sudoku->solve();

echo "The solution is:\n";
print_r($solution);