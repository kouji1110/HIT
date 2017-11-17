<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Utility {

    /**
     * usersテーブルから取得したインスタンスのprofile_fieldsにある特定情報を返す
     * @param $user Model_User::find()の返り値
     * @param $field profile_fieldsの中から欲しい情報
     * @return array|mixed
     */
    public static function get_field_from_user($user, $field) {
        if (isset($user['profile_fields'])) {
            is_array($user['profile_fields']) or $user['profile_fields'] = (unserialize(html_entity_decode($user['profile_fields'], ENT_QUOTES)) ? : array());
        } else {
            $user['profile_fields'] = array();
        }
        return is_null($field) ? $user['profile_fields'] : \Arr::get($user['profile_fields'], $field);
    }

}
