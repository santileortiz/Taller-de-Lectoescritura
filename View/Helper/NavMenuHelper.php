<?php
class NavMenuHelper extends AppHelper {
    public $items = array();
    public $helpers = array('Html');

    public function __construct(View $view, $settings = array()){
        parent::__construct($view, $settings);
        if ($settings != array())
            $this->items = $settings['items'];
    }
    public function set($disable_item = null){
        $this->_View->start('navmenu');
        if ( $this->settings != array()){
            echo $this->Html->div('menu', null);
            echo '<ul>';
            foreach ($this->items as $k => $item){
                echo '<li>';
                if ( $k != $disable_item)
                    echo $this->Html->link($k, $item);
                else
                    echo $this->Html->link($k, array('action'=>'home'), array('class'=> 'disabled'));
                echo '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }
        $this->_View->end();
    }
}
?>
