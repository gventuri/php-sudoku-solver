<?php
require('./helpers/Sudoku.class.php');
require('./helpers/helpers.php');
require('./samples/samples.php');

$sample_data = $_SUDOKU_SAMPLES['first'];
$solution_expected = $_SUDOKU_SOLUTIONS['first'];

testFunction(
    function() use($_SUDOKU_SAMPLES, $_SUDOKU_SOLUTIONS){
        foreach($_SUDOKU_SAMPLES as $key => $value){
            $sample_data       = $_SUDOKU_SAMPLES[$key];
            $solution_expected = $_SUDOKU_SOLUTIONS[$key];

            $sudoku = new Sudoku($sample_data);
            $solution = $sudoku->solve();

            return implodeGrid($solution_expected) === implodeGrid($solution);
        }
    },
    "Test has failed for sudoku",
    "Test passed for the function Sudoku->solve()"
);