<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Outputs the dynamic Captcha resource.
 * Usage: Call the Captcha controller from a view, e.g.
 *        <img src="<?php echo url::site('captcha') ?>" />
 *
 * $Id: captcha.php 3769 2008-12-15 00:48:56Z zombor $
 *
 * @package    Captcha
 * @author     Kohana Team
 * @copyright  (c) 2008-2009 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class Controller_Captcha extends Controller {

	/**
	 * @var  boolean  auto render template
	 **/
	public $auto_render = FALSE;

	public function action_index($group = 'default')
	{
		// Output the Captcha challenge resource (no html)
		// Pull the config group name from the URL
		$this->request->response = Captcha::instance($group)->render(FALSE);
	}

} // End Captcha_Controller
