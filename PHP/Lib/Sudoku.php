<?php
/**
 * @author ciogao@gmail.com
 * Date: 13-10-15 下午10:22
 */
abstract class SudokuBase
{
    protected $matrix;

    function __construct($arr = NULL)
    {
        if ($arr == NULL) {
            $this->init();
        } else {
            $this->matrix = $arr;
        }
    }

    abstract function execute($data);

    final protected function getMatrix()
    {
        return $this->matrix;
    }

    /**
     * 初始化矩阵
     */
    final protected function init()
    {
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                $this->matrix[$i][$j] = array();
                for ($k = 1; $k <= 9; $k++) {
                    $this->matrix[$i][$j][$k] = $k;
                }
            }
        }
    }

    /**
     * 打印该数据
     */
    final protected function dump()
    {
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                $c = count($this->matrix[$i][$j]);
                if ($c == 1) {
                    echo " " . current($this->matrix[$i][$j]) . " ";
                } else {
                    echo "(" . $c . ")";
                }
            }
            echo "\n";
        }
        echo "\n";
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
    final protected function setCell($row, $col, $value)
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
    final protected function removeValue($row, $col, $value)
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