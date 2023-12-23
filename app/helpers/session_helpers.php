 <?php   function isUserLogged() {
    if(isset($_SESSION["authorize"]) && $_SESSION["authorize"]) {
    return true;
    }else {
    return false;
    }
    }
    ?>