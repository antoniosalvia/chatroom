<?php

    class View {

        private $out = '';

        public function setTemplate($data){
            foreach($data as $column) {

                if(isset($_SESSION['userid']) && $_SESSION['userid'] == $column['id']) {
                    $style = 'background-color: rgba(0, 255, 0, 0.3);
                              margin: 0 0 5px 20px';
                }else {
                    $style = '';
                }

                $this->out .= '<section style="'.$style.'"><div>'.$column['name'].' <span>';
                $this->out .= date('H:i:s', strtotime($column['time']));
                $this->out .= '</span></div>';
                $this->out .= $column['text'];
                $this->out .= '</section>';
            }
            echo $this->out;
        }

    }

?>