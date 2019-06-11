<?php

class TaskController {

    public function actionIndex($page = 1, $sortField = 0, $sortOrganize = 1) {

        if (isset($_POST['submit'])) {
            $_SESSION['sort_field'] = intval($_POST['sortField']);
            $_SESSION['sort_organize'] = intval($_POST['sortOrganize']);
        }

        if (
                !isset($_SESSION['sort_field']) &&
                !isset($_SESSION['sort_organize'])
        ) {
            $_SESSION['sort_field'] = 0;
            $_SESSION['sort_organize'] = 1;
        }

        $taskList = Task::getTaskList($page, $_SESSION['sort_field'], $_SESSION['sort_organize']);
        $total = Task::getTotalTasks();
        $pagination = new Pagination($total, $page, Task::SHOW_DEFAULT, 'p');

        require_once(ROOT . '/app/views/task/index.php');
        return true;
    }

    public function actionView($id) {

        $taskItem = Task::getTaskItemById($id);

        require_once(ROOT . '/app/views/task/view.php');
        return true;
    }

    public function actionAdd() {

        if (isset($_POST['submit'])) {

            $errors = false;

            $name = htmlspecialchars($_POST['task_user_name']);
            $email = $_POST['task_email'];
            $text = htmlspecialchars($_POST['task_text']);

            if (!User::checkName($name)) {
                $errors[] = 'Field Name is blank or more then 64 symbols!';
            }

            if (!Task::checkEmail($email)) {
                $errors[] = 'Field E-mail is invalid!';
            }

            if ($text == '') {
                $errors[] = 'Field Text is blank!';
            }

            if ($errors == false) {
                $result = Task::add($name, $email, $text);
            }
        }

        require_once(ROOT . '/app/views/task/add.php');
        return true;
    }

    public function actionEdit($id) {

        User::checkAuth();

        $taskItem = Task::getTaskItemById($id);
        if (isset($_POST['submit'])) {

            $text = htmlspecialchars($_POST['task_text']);
            if (isset($_POST['task_status'])) {
                $status = intval($_POST['task_status']);
            }

            $result = Task::edit($id, $text, $status);
        }

        require_once(ROOT . '/app/views/task/edit.php');
        return true;
    }

}
