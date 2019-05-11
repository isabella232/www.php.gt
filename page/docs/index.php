<?php
namespace Gt\Website\Page\Docs;

use Gt\WebEngine\Logic\Page;

class IndexPage extends Page {
	public function go() {
		$this->redirect("/docs/webengine");
	}
}