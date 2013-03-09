<?php
/*
mstfhrgl@gmail.com
A torrent to direct link class , Mustafa HERGÜL-2013


*/


class torrent {

    

    public function run($file) {
        $dw = 'download/'.rand(1,100).time().'/';
        $save = upload_dic.$dw;
        mkdir($save);
        $cmd = 'ctorrent "'.$file. '" -s "'.$save.'"';
        
        //echo $cmd;
        if(isset($_SESSION['timeout']) and $_SESSION['timeout'] >5 )
            $timeout = intval ($_SESSION['timeout']);
        else
            $timeout = 60*60;
        
        $this->run_in_background($cmd, $timeout);
        echo $timeout;
        return '/'.$dw;
    }
    
    function kill_proc($PID = NULL){
        if($PID == NULL)
            exec('killall ctorrent');
        else{
            exec('kill '.intval($PID));
        }
        
        echo 'kill!<BR/>';
        
        $this->ps();
    }

    function run_in_background($Command, $timeout = 0, $Priority = 0) {
        if ($Priority)
            $PID = shell_exec("nohup nice -n $Priority timeout $timeout".'s'." $Command > /dev/null & echo $!");
        else
            $PID = shell_exec("nohup timeout $timeout".'s'."  $Command > /dev/null & echo $!");
        
        
        
            shell_exec("rm -f nohup.out");
        return($PID);
    }
    
    function ps(){
         exec('ps aux | grep torrent',$a);
         
         foreach ($a as $v){
             echo $v.'<br/>';
         }
    }
    
    function clear($type){
        if(empty($type)){
            $command1  = 'rm -rf '.upload_dic.'download/*';
            $command2  = 'rm -f '.upload_dic.'*.*';
        }elseif($type=='torrent_files'){
            $command2  = 'rm -f '.upload_dic.'*.*';
        }
        
        exec($command1);
        exec($command2);
        
        echo '';
            
        
    }

}

?>
