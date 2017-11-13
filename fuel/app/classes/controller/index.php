<?php

class Controller_Index extends Controller_Template {
    /**
     * トップページ ログイン画面
     */
    public function action_index() {
        $data['header']   = View::forge('layout/header');
        $data['footer'] = View::forge('layout/footer');
        return new Response(View::forge('login', $data));
    }
}