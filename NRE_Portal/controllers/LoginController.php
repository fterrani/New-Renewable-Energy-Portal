<?php

class LoginController extends HtmlController
{
    private $action = '';

    function __construct()
    {
        parent::__construct();

        $this->title = 'Welcome to NRE Portal';
        $this->addScript('script');

        $this->addStylesheet('style');
    }

    function prerun( $action, $spath, $full_uri )
    {
        $this->action = $action;

        if ( $action == 'check')
        {
            // We don't stay on /login/check
            $this->status = 302;

            // Check dans DB
            $success = false;

            try{
                $conn = new PDO(
                    'mysql:host='.__DB_HOST__.';dbname='.__DB_SCHEMA__,
                    __DB_USER__,
                    __DB_PASSWORD__
                );
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = 'SELECT * FROM `user` WHERE Email='.$conn->quote($_POST['username']).' AND Password='.$conn->quote($_POST['password']);

                $result = $conn->query($sql);


                if ($result->rowCount() == 1)
                {
                    $success = true;
                }
            }

            catch( PDOException $e) {}


            $nextPage = '/login';

            // If logged in, 302 redirection to /stats
            if ( $success )
            {
                $nextPage = '/stats';
            }

            $this->addHeader('Location', __BASE_URL__.$nextPage);
        }
    }

    function htmlBody()
    {
        if ( $this->action == '' ) {
            View::render(
                'login',
                array(
                    'title' => $this->title)
            );
        }
    }
}