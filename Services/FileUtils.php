<?php

namespace StudioArtlan\CommonLibsBundle\Services;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class FileUtils {

	public static function createFile($fileName, $contents = null, $overwrite = false) {
		
		$fs = new Filesystem();

		if (!$overwrite && $fs->exists($fileName) )
			return;

		$path = pathinfo($fileName, PATHINFO_DIRNAME);

		$fs->mkdir($path);
		$fs->touch($fileName);

		if ($contents !== null)
			file_put_contents($fileName, $contents);
	}

	public static function concatPath()
	{
			return self::concatPathArray(func_get_args());
	}

	public static function concatPathArray($pathArray)
	{
		return preg_replace( '#//#', '/', rtrim(implode('/', $pathArray),'/'));
	}

}

?>