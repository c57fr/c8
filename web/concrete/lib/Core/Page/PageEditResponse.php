<?php
namespace Concrete\Core\Page;
use \Concrete\Core\Application\EditResponse;
class PageEditResponse extends EditResponse {

	protected $cID = 0;
	protected $cIDs = array();

	public function setPage(Page $page) {
		$this->cID = $page->getCollectionID();
	}

	public function setPages($pages) {
		foreach($pages as $c) {
			$this->cIDs[] = $c->getCollectionID();
		}
	}

	public function getJSONObject() {
		$o = parent::getBaseJSONObject();
		if ($this->cID > 0) {
			$o->cID = $this->cID;
		} else if (count($this->cIDs) > 0) {
			foreach($this->cIDs as $cID) {
				$o->cID[] = $cID;
			}
		}
		return $o;
	}
	

}