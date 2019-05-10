<?php
namespace Gt\Website\Page;

use Gt\WebEngine\Logic\Page;
use Gt\Website\Github\RepoList;

class IndexPage extends Page {
	public function go() {
		$this->outputRepoList();
	}

	protected function outputRepoList():void {
		$this->document->querySelector("._repo-list ul")->bind(
			new RepoList()
		);
	}
}