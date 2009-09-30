<?php defined('SYSPATH') OR die('No direct access.');
/**
 * Math captcha class.
 *
 * @package    Captcha
 * @author     Kohana Team
 * @copyright  (c) 2008-2009 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class Captcha_Math extends Captcha
{
	private $math_exercise;

	/**
	 * Generates a new Captcha challenge.
	 *
	 * @return  string  the challenge answer
	 */
	public function generate_challenge()
	{
		// Easy
		if (Captcha::$config['complexity'] < 4)
		{
			$numbers[] = mt_rand(1, 5);
			$numbers[] = mt_rand(1, 4);
		}
		// Normal
		elseif (Captcha::$config['complexity'] < 7)
		{
			$numbers[] = mt_rand(10, 20);
			$numbers[] = mt_rand(1, 10);
		}
		// Difficult, well, not really ;)
		else
		{
			$numbers[] = mt_rand(100, 200);
			$numbers[] = mt_rand(10, 20);
			$numbers[] = mt_rand(1, 10);
		}

		// Store the question for output
		$this->math_exercise = implode(' + ', $numbers).' = ';

		// Return the answer
		return array_sum($numbers);
	}

	/**
	 * Outputs the Captcha riddle.
	 *
	 * @param   boolean  html output
	 * @return  mixed
	 */
	public function render($html = TRUE)
	{
		return $this->math_exercise;
	}

} // End Captcha Math Driver Class
