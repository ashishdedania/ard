<?php
namespace App\Exports\Report\Question;

use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;

class ExportQuestion implements FromView {

	/**
	 * construct the export
	 *
	 * @param $view
	 * @param $type
	 * @param $sessionId
	 * @param $questionAns
	 */
	public function __construct($view, $type, $sessionId, $questionAns) {
		$this->view        = $view;
		$this->type        = $type;
		$this->sessionId   = $sessionId;
		$this->questionAns = $questionAns;
	}

	/**
	 *  export question view render
	 *
	 *
	 * @param type $arrHeader
	 * @param type $arrCollection
	 * @return view
	 */
	public function view():View {
		$type            = $this->type;
		$sessionId       = $this->sessionId;
		$questionDetails = $this->questionAns;
		$export          = true;
		libxml_use_internal_errors(true);
		return view($this->view, compact('type', 'sessionId', 'questionDetails', 'export'));
		libxml_use_internal_errors(false);
	}
}
?>
