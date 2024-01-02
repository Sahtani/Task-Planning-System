<?php



class StatisticController extends Controller
{

    public function index($error = "")

    {
        if (isUserLogged()) {
            $status = "";
            $this->view("stastic", "", [
                "error" => $error,
                "statistic" => $this->statisticTask($status),
                "numberOfTask" => $this->numberOfTask(),
                "taskDone" => $this->task_Done(),
                "taskth"=>$this->task_Doneth(),
                "taskinc"=>$this->taskIN()

            ]);

            $this->view->render();
        } else {
            redirect('user/log_in');
        }
    }

    public function  statisticTask($status)
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
    public function numberOfTask()
    {
        $this->model("task");
        $taskInfo = $this->model->taskProject();
       if($taskInfo>0){
        return $taskInfo;
       }
    }
    public function task_Done()
    {
        $this->model("task");
        $taskdone = $this->model->taskDone();
        if ($taskdone > 0) {
            return $taskdone;
        }
    }
    public function task_Doneth()
    {
        $this->model("task");
        $taskdone = $this->model->taskProjectth();
        if ($taskdone > 0) {
            return $taskdone;
        }
    }

    public function taskIN()
    {
        $this->model("task");
        $taskdone = $this->model->task();
        if ($taskdone > 0) {
            return $taskdone;
        }
    }




}
