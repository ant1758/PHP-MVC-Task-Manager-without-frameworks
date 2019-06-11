<?php

class Task {

    const SHOW_DEFAULT = 3;

    public static function getTaskList($page = 1, $sortField = 0, $sortOrganize = 1) {

        $sortField = intval($sortField);
        $sortOrganize = intval($sortOrganize);

        switch ($sortField) {
            case 0: $sortField = "task_id";
                break;
            case 1: $sortField = "task_user_name";
                break;
            case 2: $sortField = "task_email";
                break;
            case 3: $sortField = "task_status";
                break;
        }
        switch ($sortOrganize) {
            case 1: $sortOrganize = "ASC";
                break;
            case 2: $sortOrganize = "DESC";
                break;
        }

        $page = intval($page);
        $count = self::SHOW_DEFAULT;
        $offset = ($page - 1) * $count;

        $db = new Db();

        $query = "SELECT * "
            . "FROM tasks "
            . "ORDER BY $sortField $sortOrganize "
            . "LIMIT $count "
            . "OFFSET $offset";
        $result = $db->get_rows($query);

        if ($result) {
            foreach ($result as $row) {
                $taskList[] = array(
                    'task_id' => $row['task_id'],
                    'task_user_name' => $row['task_user_name'],
                    'task_email' => $row['task_email'],
                    'task_text' => $row['task_text'],
                    'task_status' => $row['task_status'],
                );
            }
        }

        return $taskList;
    }

    public static function getTaskItemById($id) {

        $id = intval($id);

        if ($id) {
            $db = new Db();

            $query = "SELECT * "
                . "FROM tasks "
                . "WHERE task_id = " . $id;

            $result = $db->get_row($query);
            $taskItem = $result;

            return $taskItem;
        }
    }

    public static function getTotalTasks() {

        $db = new Db();

        $query = "SELECT COUNT(task_id) AS count "
            . "FROM tasks";
        $result = $db->get_row($query);

        $row = $result;

        return $row['count'];
    }

    public static function add($name, $email, $text) {

        $db = new Db();

        return $result = $db->insert(
            'tasks',
            [
                "task_user_name" => $name,
                "task_email" => $email,
                "task_text" => $text
            ]
        );
    }

    public static function edit($id, $text, $status = 0) {

        $db = new Db();

        return $result = $db->update(
            'tasks',
            [
                "task_text" => $text,
                "task_status" => $status
            ],
            'task_id='.$id
        );
    }

    public static function checkEmail($email) {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

}
