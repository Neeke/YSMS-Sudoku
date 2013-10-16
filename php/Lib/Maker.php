<?php
/**
 * Sudoku Maker
 *
 * @author ciogao@gmail.com
 * Date: 13-10-16 下午10:39
 */
include_once "Sudoku.php";

class SudokuMaker extends SudokuBase
{
    function __construct($arr = NULL)
    {
        parent::__construct($arr);
    }

    public function execute($tpl)
    {
        $this->init();
        $this->compute();
        $this->set($tpl);
        $this->dump();
    }

    /**
     * 传入模版
     * @param $tpl
     */
    private function set($tpl)
    {

    }

    /**
     * 准备三维数据 依次随机
     */
    private function compute()
    {

    }
}