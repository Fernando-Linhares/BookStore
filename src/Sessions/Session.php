<?php
namespace Application\Sessions;

class Session
{
    public function __construct()
    {
        session_save_path('../temp/');
        session_start();
    }

    public function all(): object
    {
        return (object) $_SESSION;
    }

    public function setUser(\App\Models\Entity\User $user): void
    {
        $_SESSION['user'] = $user;
    }

    public function getUser(): \App\Models\Entity\User
    {
        return $_SESSION['user'];
    }

    public function hasUser()
    {
        return isset($_SESSION['user']);
    }

    public function get($key)
    {
        return $_SESSION[$key];
    }

    public function set(string $key, string $value): bool
    {
        return $_SESSION[$key] = $value;
    }

    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function destroy(): bool
    {
        return session_destroy();
    } 
}