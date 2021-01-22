<pre>
<?php
      //首字大寫
class MyClass { 
    var $name;
    public $mobile;//同var宣告(較常使用)
    private $sno = 'secret'; //私人屬性只在物件{}裡有作用
    protected
                      //建構函式
    public function __construct($name='noname')
    {
        $this->name = $name;//指這個物件裡面的name等於$name
    }   //瘦箭頭->類似js點的概念，後面接$this這個物件的方法或屬性
    function myMethod1(){
     //也可以定義這個物件的方法
    }
}

$a = new MyClass(); // 可利用new建立物件的實體
echo "$a->name <br>";


$b = new MyClass('david');
echo "$b->name <br>";

?>
</pre>
