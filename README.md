# PHP Sudoku Solver

A simple sudoku solver that uses brute force to figure out a solution. Only solves sudoku where it has not to assume and test possibilities on unknowns.

The function accepts one argument consisting of the 2D puzzle array, with the value 0 representing an unknown square.
The Sudokus tested against this function can be "easy" (i.e. determinable; there will be no need to assume and test possibilities on unknowns) and are solved with a brute-force approach.
For a better understanding of Sudoku rules, have a look at https://en.wikipedia.org/wiki/Sudoku

## How to use

In order to use it, run `php example.php`. You'll see the result of the example soduko provided in `./samples/samples.php`.

Here's an example:

```
$start = [
    [5,3,0, 0,7,0, 0,0,0],
    [6,0,0, 1,9,5, 0,0,0],
    [0,9,8, 0,0,0, 0,6,0],

    [8,0,0, 0,6,0, 0,0,3],
    [4,0,0, 8,0,3, 0,0,1],
    [7,0,0, 0,2,0, 0,0,6],

    [0,6,0, 0,0,0, 2,8,0],
    [0,0,0, 4,1,9, 0,0,5],
    [0,0,0, 0,8,0, 0,7,9]
]
$sudoku = new Sudoku($start);
$solution = $sudoku->solve();
```

As you can see, the `$solution` variable will contain the solution of the provided sudoku.

## How to test

I've added a very simple test function, that reads all the samples provided and tests that the results are accurate.
You can run the tests with `php tests.php`.

## Contribution

If you think there are better ways to implement this, please, feel free to suggest.
