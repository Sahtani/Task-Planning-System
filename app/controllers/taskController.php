<?php
class TaskController extends Controller
{
    public function index($error = "")
    {
        if (isUserLogged()) {


            $this->view("task/home", ["error" => $error]);
            $this->view->render();
            // $this->view("task/home", ["error" => $error, "task" => $this->displayTasks()]);
            // $this->view->render();
        } else {
            redirect(("user/log_in"));
        }
    }
    public function addtask($error=""){
        $this->view("task/addtask",["error"=>$error]);
        $this->view->render();
    }
    public function add_Task(){
        if (isset($_POST["submit"])) {

     }
    }
    public function displayTasks()
    {
        $this->model("task");
        $tasks = $this->model->getTasks();
        if ($tasks) {
        }
    }
}
