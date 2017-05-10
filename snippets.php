<?php
    
    /* function to retrieve IP address */
    function getClientIp() {
        global $_SERVER;
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                  
        } elseif (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $realip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $realip = $_SERVER["REMOTE_ADDR"];
        }
    
        return $realip;
    }
    
    /**
	 * Convert color hex to rgb
	 *
	 * @param   $colour  Color hex
	 *
	 * @return array|bool
	 */
	public static function hex2rgb($colour = "")
	{
		if ($colour[0] == '#')
		{
			$colour = substr($colour, 1);
		}
		if (strlen($colour) == 6)
		{
			list($r, $g, $b) = array($colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5]);
		}
		elseif (strlen($colour) == 3)
		{
			list($r, $g, $b) = array($colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2]);
		}
		else
		{
			return false;
		}
		$r = hexdec($r);
		$g = hexdec($g);
		$b = hexdec($b);
		return $r . "," . $g . "," . $b;
		//return array('red' => $r, 'green' => $g, 'blue' => $b);
	}
    
function randomly() {
	$powerball = array(1,3,4,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
	$first = array(21,23,24,25,27,28,29,33,34,36,37,39);
	$main = array_merge($powerball, $first);

	$mainNumber = array();
	$m_count = count($mainNumber);

	$min = 0; 
	$max = count($main)-1;
	$max2 = count($powerball)-1;

	$x = 0; $c = 0;
	for($x = 0; $x < 16; $x++) {
		$mainNumber[$x] = array();
		$m_count = count($mainNumber[$x]);
		while($m_count < 7) {
			//get random number
			mt_srand();
			if ($m_count < 6) {
				$key = mt_rand($min, $max);
				if (!isset($main[$key])) continue;
				$mainNumber[$x][] = $main[$key];
			} else {
				$key = mt_rand($min, $max2);
				if (!isset($powerball[$key])) continue;
				$mainNumber[$x][] = $powerball[$key];
			}
			$mainNumber[$x] = array_unique($mainNumber[$x]);
			$m_count = count($mainNumber[$x]);
		}

		echo "Game " . ($x+1) . ": " . implode(", ", $mainNumber[$x]) . PHP_EOL;

		if ($x == 15) {
			echo "==================================" . PHP_EOL;
			$x = -1; 
			$c++;
		}

		if ($c >= 5) break;

	}
}
    
