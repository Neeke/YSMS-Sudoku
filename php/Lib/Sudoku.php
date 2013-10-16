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

    final protected function getMatrix()
    {
        return $this->matrix;
    }
}