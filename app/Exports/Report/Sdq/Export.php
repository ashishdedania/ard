<?php

namespace App\Exports\Report\Sdq;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class Export implements WithMultipleSheets {

    use Exportable;

    protected $year;

    public
            function __construct($arrHeader, $arrRowData, $finalScore, $masterScale) {
        $this->arrHeader = $arrHeader;
        $this->arrRowData = $arrRowData;
        $this->finalScore = $finalScore;
        $this->masterScale = $masterScale;
        }

        /**
         * @return array
         */
        public function sheets(): array {

        $sheets[] = new RawSheet($this->arrHeader, $this->arrRowData);
        $sheets[] = new ScoreSheet($this->finalScore);
        $sheets[] = new MasterSheet($this->masterScale);

        return $sheets;
    }

}

?>