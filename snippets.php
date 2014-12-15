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
    
    
