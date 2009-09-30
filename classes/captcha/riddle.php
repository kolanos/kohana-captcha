<?php defined('SYSPATH') OR die('No direct access.');
/**
 * Riddle captcha class.
 *
 * @package    Captcha
 * @author     Kohana Team
 * @copyright  (c) 2008-2009 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class Captcha_Riddle extends Captcha
{
	private $riddle;

	/**
	 * Generates a new Captcha challenge.
	 *
	 * @return  string  the challenge answer
	 */
	public function generate_challenge()
	{
		// Load riddles from the current language
		$riddles = Kohana::config('captcha.riddles');

		// Pick a random riddle
		$riddle = $riddles[array_rand($riddles)];

		// Store the question for output
		$this->riddle = $riddle[0];

		// Return the answer
		return (string) $riddle[1];
	}

	/**
	 * Outputs the Captcha riddle.
	 *
	 * @param   boolean  html output
	 * @return  mixed
	 */
	public function render($html = TRUE)
	{
		return $this->riddle;
	}

} // End Captcha Riddle Driver Class
