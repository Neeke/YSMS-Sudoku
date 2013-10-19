<?php
/**
 * Sudoku Solver
 *
 * @author ciogao@gmail.com
 * Date: 13-10-16 下午09:30
 */
include_once "Sudoku.php";

class SudokuSolver extends SudokuBase
{
    function __construct($arr = NULL)
    {
        parent::__construct($arr);
    }

    public function execute($data)
    {
        $this->init();
        $this->set($data);
        $this->compute();
        $this->dump();
    }

    /**
     * 在矩阵上描点
     * @param $arr
     */
    private function set($arr)
    {
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if ($arr[$i][$j] > 0) {
                    $this->setCell($i, $j, $arr[$i][$j]);
                }
            }
        }
    }

    private function compute()
    {
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if (count($this->matrix[$i][$j]) == 1) {
                    continue;
                }
                foreach ($this->matrix[$i][$j] as $v) {
                    $t = new SudokuSolver($this->matrix);
                    if (!$t->setCell($i, $j, $v)) {
                        continue;
                    }
                    if (!$t->compute()) {
                        continue;
                    }
                    $this->matrix = $t->matrix;
                    return TRUE;
                }
                return FALSE;
            }
        }
        return TRUE;
    }
}
