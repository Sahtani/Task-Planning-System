<?php
class TaskController extends Controller
{
    public function task($project_id, $error = "")
     
    {     
        if (isUserLogged()) {
            $status = "";

            if (isset($_SESSION["idproject"])) {
                $_SESSION["idproject"] =intval($project_id);
            } else {
                echo "Project ID not found in the session.";
            }
            if (isset($_SESSION["user-id"])) {
                $user_id = $_SESSION["user-id"];
            } else {
                echo "User ID not found in the session.";
            }
            $this->view("task/home", "", ["error" => $error, "task" => $this->displayTasks($user_id, $project_id), "numberOftask" => $this->count_Task($user_id, $project_id, $status)]);
            $this->view->render();
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
                redirect("task/task/" . $idproject);

                exit();
            } else {
                $this->task($idproject, "task not Added Successfully!");
            };
        }
    }
    public function displayTasks($user_id, $project_id)
    {
        $this->model("task");
        $tasks = $this->model->getTasks($user_id, $project_id);
        if ($tasks) {
            return $tasks;
        } else return false;
    }
    public function delete_task($idTask)
    {
        $project_id = $_SESSION["idproject"];
        $this->model("task");
        $this->model->setIdta($idTask);
        $result = $this->model->Archive($idTask);
        if ($result) {
            redirect("task/task/" . $project_id);
            exit();
        }
    }
    public function count_Task($user_id, $project_id, $status)
    {
        if (isset($_SESSION["user-id"])) {
            $user_id = $_SESSION["user-id"];
        } else {
            echo "User ID not found in the session.";
        }
        $project_id = $_SESSION["idproject"];
        $this->model("task");
        $taskTodo = $this->model->countTask($user_id, $project_id, "to do");
        $taskInprogress = $this->model->countTask($user_id, $project_id, "in progress");
        $taskDoing = $this->model->countTask($user_id, $project_id, "doing");

        return
            [
                "to do" => $taskTodo,
                "in progress" => $taskInprogress,
                "doing" => $taskDoing,


            ];
    }
    public function displaytaskRow($idtask)
    {
        $this->model("task");
        $this->model->setIdta($idtask);
        $task = $this->model->gettaskRow($idtask);
        if ($task) {
            return $task;
        }
    }
    public function updateTask($idtask, $error = "")
    {
        if (isUserLogged()) {
           $id=intval($idtask);
           
            $task = $this->displaytaskRow($id);
            $this->view("task/uptask", "", ["error" => $error, "task" => $task]);
            $this->view->render();
        } else {
            redirect('user/log_in');
        }
    }
    public function update_Task(){
        $idTask=$_POST['id'];
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
        $this->model->setIdta($idTask);
        $title = $this->validateData($title);
        $this->model->setTitle($title);
        $des = $this->validateData($des);
        $this->model->setDescta($des);
        $status = $this->validateData($status);
        $this->model->setStatus($status);
        $status = $this->validateData($deadline);
        $this->model->setdeadline($deadline);
        $task = $this->model->updateTask($idTask);
        if ($task) {
            redirect("task/task/" . $idproject);

            exit();
        } else {
            $this->task($idproject, "task not updated Successfully!");
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
