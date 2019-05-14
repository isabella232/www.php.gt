<?php
namespace Gt\Website\Page\Docs\_Repo;

use Gt\WebEngine\Logic\Page;

class _DocPage extends Page {
	public function go() {
		$repo = $this->dynamicPath->get("repo");
		$doc =  $this->dynamicPath->get("doc");
	}
}