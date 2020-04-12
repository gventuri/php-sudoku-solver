<?php

class Sudoku{
  // Declare the grid values
  private $total_size = 9;
  private $grids_amount = 3;

  public $data = [];

  /***
   * Initialize
   * 
   * @param $data array
   */
  public function __construct($data){
    $this->data = $data;
  }

  /***
   * Get value by coords
   * 
   * @param $x int
   * @param $y: int
   * @return int
   */
  public function getValueByCoords($x, $y){
    return $this->data[$y][$x];
  }

  /***
   * Set value by coords
   * 
   * @param $x int
   * @param $y: int
   * @param $v: int
   * @return int
   */
  public function setValueByCoords($x, $y, $v){
    return $this->data[$y][$x] = $v;
  }

  /***
   * Get grid results based on the grid_amount
   * 
   * @param $x int
   * @param $y: int
   * @return array
   */
  public function getGridResults($x, $y){
    $list = [];

    $x_grid = floor($x/$this->grids_amount) * $this->grids_amount;
    $y_grid = floor($y/$this->grids_amount) * $this->grids_amount;

    for($a = $x_grid; $a < $x_grid + ($this->total_size / $this->grids_amount); $a++){
      for($b = $y_grid; $b < $y_grid + ($this->total_size / $this->grids_amount); $b++){
        $list[] = $this->getValueByCoords($a, $b);
      } 
    }

    return $list;
  }

   /***
     * Get column results
     * 
     * @param $x: int
     * @return array
     */
  public function getColResults($x){ 
    $list = [];

    foreach($this->data as $row){
      $list[] = $row[$x];
    }

    return $list;
  }

  /***
   * Get row results
   * 
   * @param $y: int
   * @return int
   */
  public function getRowResults($y){
    return $this->data[$y];
  }

  /***
   * Solve the sudoku
   * 
   * @return array
   */
  public function solve(){
    while(true){
      $solved = true;

      for($x = 0; $x < $this->total_size; $x++){
        for($y = 0; $y < $this->total_size; $y++){
          // Get the value from the provided coords
          $value = $this->getValueByCoords($x, $y);

          if($value === 0){
            // The value is 0, need to find the correct one
            $possible_values = [];

            $grid = $this->getGridResults($x, $y);
            $col  = $this->getColResults($x);
            $row  = $this->getRowResults($y);

            for($v = 1; $v <= $this->total_size; $v++){
              // If the number is not contained in the col, row and grid, add to possible values
              if(!in_array($v, $grid) && !in_array($v, $col) && !in_array($v, $row)) $possible_values[] = $v;
            }

            if(count($possible_values) === 0) {
              break 3;
            }

            // If there's just 1 possible value
            if(count($possible_values) === 1){
              $this->setValueByCoords($x, $y, $possible_values[0]);
            }else{
              // Missing at least 1 solution, not solved yet
              $solved = false;
            }
          }
        }
      }

      if($solved) {
        // Return the solution
        return $this->data;
        break;
      }
    }
  }
}