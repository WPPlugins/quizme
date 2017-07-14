<?php
/*****************************************************************************************
* All the front stuff
*****************************************************************************************/
class sv46v_front extends wv46v_action {
	public function plugins_loadedWPaction()
	{
		add_shortcode ( $this->application()->slug, array($this,'shortcode_to_action') );
	}
	public function shortcode_to_action($atts, $content=null, $code="") {
		$form = null;
		if (isset ( $atts ['form'] ) && ! empty ( $atts ['form'] )) {
			$form = $atts ['form'];
		}
		else{
			if(is_array($atts))
			{
				foreach($atts as $form)
				{
					break;
				}
			}
		}
		return $this->application()->form($form)->render();
	}
}		