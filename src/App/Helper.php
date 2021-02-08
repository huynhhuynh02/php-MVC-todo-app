<?php
    namespace NalSolution\App;
    class Helper
    {
        public static function view(string $view, array $data = [])
        {
            $file = APP_ROOT. '/Views/'. $view. '.php';
            if(is_readable($file)) require_once $file;
            else die('404 Page Not Found');
        }
        public static function redirect($url)
        {
            header("Location:".URL_ROOT.'/'.$url);
            exit;
        }
        public static function slug($string, $delimiter = '-')
        {
            
        }
    }
?>