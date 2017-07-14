<?php
/*****************************************************************************************
* filters on data writes
*****************************************************************************************/
class sv46v_write extends wv46v_action {
/*****************************************************************************************
* ??document??
*****************************************************************************************/
	public function field_options($return) {
		if (! empty ( $return ) && ! is_array ( $return )) {
			$return = explode ( "\n", $return );
			// do the trim after its been turned to an arryam allows for a blank leader, and will trim each option to.
			foreach ( $return as &$option ) {
				$option = trim ( $option, "\r\n\t " );
			}
			unset ( $option );
		}
		return $return;
	}
	public function v46v_quizme_writeWPfilter($return,$form) {
		if($this->application()->slug!='quizme')
		{
			return $return;
		}
		return $this->write ( $return,$form );
	}
	public function v46v_surveyme_writeWPfilter($return,$form) {
		if($this->application()->slug!='surveyme')
		{
			return $return;
		}
		return $this->write ( $return,$form );
	}
	public function v46v_pollme_writeWPfilter($return,$form) {
		if($this->application()->slug!='pollme')
		{
			return $return;
		}
		return $this->write ( $return,$form );
	}
	public function v46v_submission_writeWPfilter($return,$form) {
		if($this->application()->slug!='submission')
		{
			return $return;
		}
		return $this->write ( $return,$form );
	}
	public function v46v_contactme_writeWPfilter($return,$form) {
		if($this->application()->slug!='contactme')
		{
			return $return;
		}
		return $this->write ( $return ,$form);
	}
	public function write($return,$form) {
		foreach ( $return['field_definitions'] as $key => &$value ) {
			if(isset($value['options']))
			{
				$value['options'] = $this->field_options($value['options']);
			}
			if (isset ( $value ['delete'] ) || $value['type']=='new') {
				unset ( $return ['field_definitions'][$key] );
			}
		}
		unset ( $value );
		return $return;
	}
}		