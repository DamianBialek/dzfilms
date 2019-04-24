<?php


class Notifications
{
    public static function getAll($group = null)
    {
        if(!empty($group))
            return isset($_SESSION['notifications'][$group]) ? $_SESSION['notifications'][$group] : null;

        return $_SESSION['notifications'];
    }

    public static function add($message, $type = 'success', $group = null)
    {
        $notification = [
            'message' => $message,
            'type' => $type
        ];
        if(!empty($group)) {
            $_SESSION['notifications'][$group][] = $notification;
            return true;
        }

        $_SESSION['notifications'][$type][] = $notification;
        return true;
    }

    public static function clearAll()
    {
        unset($_SESSION['notifications']);
    }
}