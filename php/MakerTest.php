<?php
/**
 * @author ciogao@gmail.com
 * Date: 13-10-17 下午11:20
 */
include_once "Lib/Maker.php";

$maker = new SudokuMaker();

$maker->execute(
    array(
        array(0, 1, 0, 0, 0, 1, 0, 1, 0),
        array(0, 1, 1, 0, 1, 1, 1, 0, 0),
        array(0, 1, 0, 0, 0, 1, 0, 1, 1),
        array(1, 0, 1, 0, 1, 1, 0, 0, 1),
        array(0, 1, 0, 0, 1, 0, 0, 1, 0),
        array(1, 0, 0, 0, 0, 1, 1, 0, 1),
        array(1, 1, 0, 1, 0, 0, 0, 1, 0),
        array(0, 0, 1, 1, 1, 0, 1, 1, 0),
        array(0, 1, 0, 1, 0, 0, 0, 1, 0),
    )
);