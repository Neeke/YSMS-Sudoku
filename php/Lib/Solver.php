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

    /**
     * 设置单元格值
     * 同时清除row && col上相等值
     *
     * @param $row
     * @param $col
     * @param $value
     * @return bool
     */
    private function setCell($row, $col, $value)
    {
        $this->matrix[$row][$col] = array($value => $value);

        //行
        for ($i = 0; $i < 9; $i++) {
            if ($i != $col) {
                if (!$this->removeValue($row, $i, $value)) {
                    return FALSE;
                }
            }
        }

        //列
        for ($i = 0; $i < 9; $i++) {
            if ($i != $row) {
                if (!$this->removeValue($i, $col, $value)) {
                    return FALSE;
                }
            }
        }

        //宫
        $rs = intval($row / 3) * 3;
        $cs = intval($col / 3) * 3;

        for ($i = $rs; $i < $rs + 3; $i++) {
            for ($j = $cs; $j < $cs + 3; $j++) {
                if ($i != $row && $j != $col) {
                    if (!$this->removeValue($i, $j, $value))
                        return FALSE;
                }
            }
        }
        return TRUE;
    }

    /**
     * 清除三维可能值
     *
     * @param $row
     * @param $col
     * @param $value
     * @return bool
     */
    private function removeValue($row, $col, $value)
    {
        $count = count($this->matrix[$row][$col]);
        if ($count == 1) {
            $ret = !isset($this->matrix[$row][$col][$value]);
            return $ret;
        }
        if (isset($this->matrix[$row][$col][$value])) {
            unset($this->matrix[$row][$col][$value]);
            if ($count - 1 == 1) {
                return $this->setCell($row, $col, current($this->matrix[$row][$col]));
            }
        }
        return TRUE;
    }
}
