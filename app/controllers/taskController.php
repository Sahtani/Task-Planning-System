<?php
class TaskController extends Controller
{
    public function task($project_id, $error = "")
    {
        if (isUserLogged()) {
            $_SESSION["idproject"]=intval($project_id);
            $this->view("task/home", "", ["error" => $error]);
            $this->view->render();
            // $this->view("task/home", ["error" => $error, "task" => $this->displayTasks()]);
            // $this->view->render();
        } else {
            redirect("user/log_in");
        }
    }
    public function addtask($error = "")
    {
        $this->view("task/addtask", ["error" => $error]);
        $this->view->render();
    }
    public function add_Task()
    {
        if (isset($_POST["submit"])) {
            $title = $_POST['task-title'];
            $des = $_POST['task-description'];
            $status = $_POST['status'];
            $deadline = $_POST['date'];
            if (isset($_SESSION["user-id"])) {
                $user_id = $_SESSION["user-id"];
            } else {
                echo "User ID not found in the session.";
            }
            $idproject = $_SESSION["idproject"];
            $this->model("task");
            $title = $this->validateData($title);
            $this->model->setTitle($title);
            $des = $this->validateData($des);
            $this->model->setDescta($des);
            $status = $this->validateData($status);
            $this->model->setStatus($status);
            $status = $this->validateData($deadline);
            $this->model->setdeadline($deadline);
            $task = $this->model->addTask($user_id, $idproject);
            if ($task) {
                $this->task($idproject, "task not Added Successfully!");
                exit;
            } else {
                $this->task($idproject, "task/home");
            };
        }
    }
    public function displayTasks()
    {
        $this->model("task");
        $tasks = $this->model->getTasks();
        if ($tasks) {
        }
    }
    public function validateData($data)
    {
        if (isset($data) and !empty($data)) {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
}
