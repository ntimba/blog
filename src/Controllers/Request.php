<?php
// Src/Controllers/Request.php
declare(strict_types=1);

class Request {
    private $get;
    private $post;
    private $cookie;
    private $session;
    private $server;

    public function __construct() {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->cookie = $_COOKIE;
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->session = $_SESSION;
        $this->server = $_SERVER;
    }

    public function get($key = null) {
        return $key === null ? $this->get : ($this->get[$key] ?? null);
    }

    public function post($key = null) {
        return $key === null ? $this->post : ($this->post[$key] ?? null);
    }

    public function cookie($key = null) {
        return $key === null ? $this->cookie : ($this->cookie[$key] ?? null);
    }

    public function session($key = null) {
        return $key === null ? $this->session : ($this->session[$key] ?? null);
    }

    public function server($key = null) {
        return $key === null ? $this->server : ($this->server[$key] ?? null);
    }
}

// Utilisation de l'objet Request pour accéder aux variables globales
$request = new Request();

// Exemples d'utilisation
$postTitle = $request->post('postTitle');
$cookieValue = $request->cookie('cookieName');
$sessionValue = $request->session('sessionKey');
$requestUri = $request->server('REQUEST_URI');
