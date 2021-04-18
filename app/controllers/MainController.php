<?php

namespace app\controllers;

use GuzzleHttp\Client as Client;

class MainController extends AppController
{

    public function indexAction()
    {
        $menu = $this->menu;
        $this->setMeta('Главная страница', 'Описание страницы', 'Ключевые слова');
        $meta = $this->meta;
        $title = 'PAGE_TITLE';
        $this->set(compact('title', 'menu', 'meta'));
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function loginAction()
    {
        $this->layout = false;
        $this->view = false;

        $params = ['login' => $_POST['login'], 'pass' => $_POST['pass']];
        $url = 'http://testapi.ru/auth?' . http_build_query($params);
        $client = new Client();
        $response = $client->get($url);
        $data = $response->getBody();
        $str = ''; $str .= $data;
        $arrayData = explode('"', $str);

        if($arrayData[3] == 'Ok'){
            $_SESSION['status'] = $arrayData[3];
            $_SESSION['token'] = $arrayData[7];
            $_SESSION['username'] = $arrayData[11];
        }else{
            $_SESSION['status'] = $arrayData[3];
            $_SESSION['token'] = null;
            $_SESSION['username'] = null;
        }
    }

    public function logoutAction()
    {
        $_SESSION['token'] = null;
        $_SESSION['username'] = null;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserAction()
    {
        $this->layout = false;
        $this->view = false;

        $url = 'http://testapi.ru/get-user/' . $_SESSION['username'] . '?token=' . $_SESSION['token'];
        $client = new Client();
        $response = $client->get($url);
        $data = $response->getBody();
        $str = ''; $str .= $data;
        print_r($str);
    }


    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFormUserUpdateAction()
    {
        $this->layout = false;
        $this->view = false;

        $url = 'http://testapi.ru/form-user/' . $_SESSION['username'] . '?token=' . $_SESSION['token'];
        $client = new Client();
        $response = $client->get($url);
        echo $response->getBody();
    }


    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function saveFormUserUpdateAction()
    {
        $this->layout = false;
        $this->view = false;

        $active = isset($_POST['active']) ? 1 : 0;
        $blocked = isset($_POST['blocked']) ? 1 : 0;
        $permissions = '';
        foreach (array_keys($_POST) as $key) {
            if (strpos($key, 'permission') !== false) {
                $id = explode('permission-', $key)[1] . ',';
                $permissions .= $id;
            }
        }

        $url = 'http://testapi.ru/user/' . $_POST['id'] . '/update?token=' . $_SESSION['token'];
        $client = new Client();
        $response = $client->request('POST', $url, [
            'form_params' => [
                'active' => $active,
                'blocked' => $blocked,
                'name' => $_POST['name'],
                'permissions' => $permissions,
            ]
        ]);
        echo $response->getBody();
    }


}