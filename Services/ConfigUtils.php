<?php

namespace StudioArtlan\CommonLibsBundle\Services;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;

class ConfigUtils {

    public function __construct(\AppKernel $kernel)
    {
        $this->kernel = $kernel;
    }

	public function getConfigFile($fileName)
	{
		return $this->kernel->getContainer()->get('file_locator')->locate($fileName, $this->kernel->getRootDir() . '/config');
	}

	public function getConfigResource($fileName)
	{
		return $this->kernel->locateResource($fileName);
	}
	
	public function yamlParse($fileName)
	{
		if (strpos($fileName, '@') === 0)
			return Yaml::parse($this->getConfigResource($fileName));
		else
			return Yaml::parse($this->getConfigFile($fileName));
	}

}

?>