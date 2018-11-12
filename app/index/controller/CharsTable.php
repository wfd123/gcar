<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/21 0021
 * Time: 上午 11:29
 */

namespace app\api\controller;


use think\Controller;

use think\Db;

/**
 * 形如这样的表，用来存储最多255个字符，并提供读写某一位的功能，可以设置一个字符来表示'空字符'
 * thekey               value
 * somekey              01###bcd0#110##Z100
 */
class CharsTable  extends Controller {

    private $prefix = '';
    private $tableName = '';
    private $emptyChar = '#';
    private $length = 255;

    /**
     * 构造函数
     * @param string $prefix 表前缀
     * @param string $tableName 表名
     * @param string $emptyChar 表示空的字符（必须是一个字符，例如'0','#','_'等）
     * @param string $length 长度，不超过255
     */
    public function __construct($params) {
        $this->prefix = $params['prefix'];
        $this->tableName = $params['tableName'];
        $this->emptyChar = $params['emptyChar'];
        $this->length = $params['length'];
    }

//    public function install() {
//        $model = M();
//
//        $name = $this->prefix.''.$this->tableName;
//        $sql = <<< EOF
//        CREATE TABLE IF NOT EXISTS `$name` (
//          `thekey` varchar(255) NOT NULL,
//          `chars` varchar(255) NOT NULL,
//          PRIMARY KEY USING BTREE (`thekey`)
//        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
//EOF;
//        dump($sql);
//        dump($model->execute($sql));
//    }

//    public function remove() {
//        M()->execute('DROP TABLE '.$this->prefix.''.$this->tableName);
//    }
    /**
     * 获取整个字符串
     * @param  string $thekey 键
     * @return string 字符串
     */
    public function getchars($thekey) {
        $old = Db::name($this->tableName)->find($thekey);
       // $old = $m->find($thekey);
        if ( ! $old) {
            return str_repeat($this->emptyChar, $this->length);
        }
        else {
            return $old['chars'];
        }
    }

    /**
     * 设置整个字符串，如果字符串长度小于长度，会被空字符串填满，
     * @param  string $thekey 键
     * @param  string $chars 字符串
     * @return boolean 是否成功
     */
    public function setchars($thekey, $chars = NULL) {
        //$m = M($this->tableName, $this->prefix);
        $normalChars = substr_replace(
            str_repeat($this->emptyChar, $this->length),
            substr($chars, 0, $this->length),
            0,
            strlen($chars));
        $data = array(
            'thekey' => $thekey,
            'chars' => $normalChars,
        );

        $old = Db::name($this->tableName)->find($thekey);
        if ( ! $old) {
            return Db::name($this->tableName)->insert($data) > 0;
        }
        else {
            return Db::name($this->tableName)->update($data) > 0;
        }
    }

    /**
     * 获取某个位置的字符
     * @param  string $chars 字符串
     * @param  integer $index 位置，[0,(maxLegnth-1)]
     * @return string 那个位置的字符
     */
    public function getchar($chars, $index) {
        return substr($chars, min(max($index, 0), $this->length-1), 1);
    }

    /**
     * 设置某个位置的字符
     * @param  string $chars 字符串
     * @param  integer $index 位置，[0,(maxLegnth-1)]
     * @param  string $char 单个字符
     * @return string 新字符串
     */
    public function setchar($chars, $index, $char) {
        return substr_replace($chars, $char, min(max($index, 0), $this->length-1), 1);
    }

    /**
     * 判断某个位置的字符是否为空字符
     * @param  string $thekey 键
     * @param  integer $index 位置，[0,(maxLegnth-1)]
     * @return boolean 那个位置的数据
     */
    public function emptychar($char) {
        return $char === $this->emptyChar;
    }

    /**
     * 获取非空字符的数量
     * @param  [type] $chars 非空字符的数量
     * @return [type]        [description]
     */
    public function validcount($chars) {
        return strlen($chars) - substr_count($chars, $this->emptyChar);
    }

    /**
     * 返回每个位置都是空的字符串
     */
    public function emptychars() {
        return str_repeat($this->emptyChar, $this->length);
    }
}