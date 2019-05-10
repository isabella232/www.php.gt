<?php
namespace Gt\Website\Github;

class Repo {
	public $name;
	public $description;
	public $repo;

	public function __construct(
		string $name,
		string $description
	) {
		$this->name = $name;
		$this->repo = strtolower($name);
		$this->description = $description;
	}
}