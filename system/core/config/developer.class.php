<?php
	class developer extends config{
		function developer(){
			$this->log = FALSE;
			$this->detailed_log = FALSE;
                        $this->actions_enabled = TRUE;
                        $this->action_format = '_action';
                        $this->mode = '';
		}
	}
?>
