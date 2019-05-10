<?php
namespace Gt\Website\Github;

use Gt\Fetch\BodyResponse;
use Gt\Fetch\Http;
use Gt\WebEngine\FileSystem\Path;
use Iterator;

class RepoList implements Iterator {
	/** @var Repo[] */
	protected $iterator;
	/** @var int */
	protected $iteratorKey;

	public function __construct() {
		$this->iteratorKey = 0;
		$this->iterator = [];
		$this->loadGithubRepos();
	}

	protected function loadGithubRepos() {
		$dataDir = Path::getDataDirectory();
		$cacheFilePath = implode(DIRECTORY_SEPARATOR, [
			$dataDir,
			Cache::CACHE_FILE,
		]);
		if(!is_file($cacheFilePath)) {
			Cache::refresh();
		}

		$this->iterator = unserialize(file_get_contents($cacheFilePath));
	}

	/**
	 * @link https://php.net/manual/en/iterator.rewind.php
	 */
	public function rewind():void {
		$this->iteratorKey = 0;
	}

	/**
	 * @link https://php.net/manual/en/iterator.valid.php
	 */
	public function valid():bool {
		return isset($this->iterator[$this->iteratorKey]);
	}

	/**
	 * @link https://php.net/manual/en/iterator.key.php
	 */
	public function key():int {
		return $this->iteratorKey;
	}

	/**
	 * @link https://php.net/manual/en/iterator.current.php
	 */
	public function current():Repo {
		return $this->iterator[$this->iteratorKey];
	}

	/**
	 * @link https://php.net/manual/en/iterator.next.php
	 */
	public function next():void {
		$this->iteratorKey++;
	}
}