<?php

namespace StudioArtlan\CommonLibsBundle\Services;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;

class ConfigUtils {

	public static function loadConfig($fileName, $configDirectories = array('app/config'))
	{
		$locator = new FileLocator($configDirectories);
		return $locator->locate($fileName);
	}
	
	public static function yamlParse($fileName)
	{
		return Yaml::parse(self::loadConfig($fileName));
	}

}

?>