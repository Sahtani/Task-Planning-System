<?php



class StatisticController extends Controller
{

    public function index($error = "")
   
    { 
        if (isUserLogged()) {
            $status = "";
            // if (isset($_SESSION["user-id"])) {
            // $user_id = $_SESSION["user-id"];
            // } else {
            // echo "User ID not found in the session.";
            // }
            $this->view("stastic", "", ["error" => $error, "statistic" => $this->statisticTask($status)]);
            $this->view->render();
        } else {
            redirect('user/log_in');
        }
    }

    public function
    statisticTask($status)
    {
        $this->model("task");
        $taskTodo = $this->model->statistictask("to do");
        $taskInprogress = $this->model->statistictask("in progress");
        $taskDoing = $this->model->statistictask("doing");

        return
            [
                "to do" => $taskTodo,
                "in progress" => $taskInprogress,
                "doing" => $taskDoing,


            ];
    }
}
