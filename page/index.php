<?php
namespace Gt\Website\Page;

use Gt\WebEngine\Logic\Page;

class IndexPage extends Page {
	public function go() {
		$this->document->querySelector("._repo-list");
	}
}