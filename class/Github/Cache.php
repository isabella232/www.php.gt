<?php
namespace Gt\Website\Github;

use Gt\Fetch\BodyResponse;
use Gt\Fetch\Http;
use Gt\WebEngine\FileSystem\Path;

class Cache {
	const DO_NOT_SHOW_REPOS = ["www.php.gt", "Maintenance", "StyleGuide"];
	const CACHE_FILE = "repoList.dat";

	protected static $data;

	public static function refresh():void {
		$data = [];

		$http = new Http();
		$http->fetch("https://api.github.com/orgs/phpgt/repos")
		->then(function(BodyResponse $response) {
			return $response->json();
		})
		->then(function($json)use(&$data) {
			foreach($json as $repoData) {
				if(in_array($repoData->name, self::DO_NOT_SHOW_REPOS)) {
					continue;
				}

				$repo = new Repo(
					$repoData->name,
					$repoData->description
				);
				$data []= $repo;
			}
		});
		$http->wait();

		$dataDir = Path::getDataDirectory();
		if(!is_dir($dataDir)) {
			mkdir($dataDir, 0775, true);
		}

		file_put_contents(
			implode(DIRECTORY_SEPARATOR, [
				$dataDir,
				self::CACHE_FILE,
			]),
			serialize($data)
		);
	}
}