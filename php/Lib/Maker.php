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
    private $tpl = array();

    function __construct($arr = NULL)
    {
        parent::__construct($arr);
    }

    public function execute($tpl)
    {
        $this->init();
        $this->compute();
        $this->setTpl($tpl);
        $this->dump();

        $this->useTpl();
    }

    /**
     * 传入模版
     * @param $tpl
     */
    private function setTpl($tpl)
    {
        $this->tpl = $tpl;
    }

    /**
     * 随机描点
     */
    protected function compute()
    {
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                $this->randCell($i,$j);
            }
        }
    }

    private function randCell($row = 0,$col = 0)
    {
        shuffle($this->matrix[$row][$col]);
        $this->setCell($row, $col, current($this->matrix[$row][$col]));
    }

    /**
     * 应用模板抠除
     */
    private function useTpl()
    {
        foreach($this->tpl as $row => $tplRow){
            foreach($tplRow as $col => $tplCol){
                if ($tplCol){
                    echo " " . current($this->matrix[$row][$col]) . " ";
                }else{
                    echo " □ ";
                }
            }
            echo "\n";
        }
        echo "\n";
    }

}