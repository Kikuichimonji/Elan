<?php
    namespace Controller;

    class ViewController{

        public function index()
        {
            $result = "connect";
            return ["view" => $result];
        }

        public function forum()
        {
            $result = "forum";
            return ["view" => $result];
        }

        public function sujet()
        {
            $result = "sujet";
            return ["view" => $result];
        }

        public function registerform()
        {
            $result = "register";
            return ["view" => $result];
        }

        public function membre()
        {
            $result = "membre";
            return ["view" => $result];
        }

        public function post()
        {
            $result = "post";
            return ["view" => $result];
        }

        public function edit()
        {
            $result = "edit";
            return ["view" => $result];
        }
    }
?>