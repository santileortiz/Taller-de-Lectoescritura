<?php
class NavMenuHelper extends AppHelper {
    public $helpers = array('Html');
    public $auth_user;
    public $menus = array();

    public function __construct(View $view, $settings = array()){
        parent::__construct($view, $settings);
        $this->auth_user = $this->_View->get('auth_user');
        if ($settings != array())
            $this->items = $settings['items'];

        $this->menus = array(
            'asesor' => array(
                'items' => array(
                    'Mi Perfil' => array('controller' => 'Advisers', 'action' => 'view'),
                    'Asesores' => array('controller' => 'Advisers', 'action' => 'index'),
                    'Tutores' => array('controller' => 'Tutors', 'action' => 'index'),
                    'Equipos' => array('controller' => 'Tutors', 'action' => 'assignTeams'),
                    'Salir' => array('controller' => 'Users', 'action' => 'logout')
                )
            ),
            'tutor' => array(
                'items' => array(
                    'Mi Perfil' => array('controller' => 'Tutors', 'action' => 'view'),
                    'Asesores' => array('controller' => 'Advisers', 'action' => 'index'),
                    'Tutores' => array('controller' => 'Tutors', 'action' => 'index'),
                    'Equipos' => array('controller' => 'Tutors', 'action' => 'assignTeams'),
                    'Salir' => array('controller' => 'Users', 'action' => 'logout')
                )
            )
        );
    }
    public function set($disable_item = null){
        $menu = $this->menus[$this->auth_user['type']];
        $this->_View->start('navmenu');
        if ( $this->menus != array()){
            echo $this->Html->div('menu', null);
            echo '<ul>';
            foreach ($menu['items'] as $k => $item){
                echo '<li>';
                if ( $k != $disable_item)
                    echo $this->Html->link($k, $item);
                else
                    echo $this->Html->link($k, $item, array('class'=> 'disabled'));
                echo '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }
        $this->_View->end();
    }
}
?>
