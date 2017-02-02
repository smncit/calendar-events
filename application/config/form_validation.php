<?php
defined('BASEPATH') or exit('No direct script access allowed');

// if username is supplied.
$pos = strpos($this->input->post('loginby'), '@' );
var_dump($pos);
if ( $pos !== FALSE) {
    $loginrule = 'valid_email';
}
else {
    $loginrule = 'alpha_dash';
}

$config = array(
    'users/login' => array(
        array(
            'field' => 'loginby',
            'label' => 'Loginby',
            'rules' => 'trim|required|' . $loginrule . '|min_length[6]|max_length[128]',
            'errors' => array(
                'required' => 'Wrong Username or Password',
                'alpha_dash' => 'Wrong Username or Password',
                'min_length' => 'Wrong Username or Password',
                'max_length' => 'Wrong Username or Password'
            )
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required',
            'errors' => array(
                'required' => 'Wrong Username or Password'
            )
        )
    ),
    'users/signup' => array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|alpha_dash|min_length[6]|max_length[128]'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[6]|max_length[128]'
        ),
        array(
            'field' => 'passwordconf',
            'label' => 'Confirm Password',
            'rules' => 'required|matches[password]',
            'errors' => array(
                'matches' => 'The passwords do not match.'
            )
        )
    ),
    'events/create' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|alpha_dash|max_length[128]'
        ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'alpha_dash'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[6]|max_length[128]'
        ),
        array(
            'field' => 'passwordconf',
            'label' => 'Confirm Password',
            'rules' => 'required|matches[password]',
            'errors' => array(
                'matches' => 'The passwords do not match.'
            )
        )
    )
);