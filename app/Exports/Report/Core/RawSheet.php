<?php

namespace App\Exports\Report\Core;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

class RawSheet implements FromCollection, WithTitle {

    public function __construct($arrHeader, $arrRowData) {
        $this->arrHeader = $arrHeader;
        $this->arrRowData = $arrRowData;
    }

    public function collection() {
        $collection = collect(array_values($this->arrRowData))->prepend($this->arrHeader);
        return $collection;
    }

    /**
     * @return string
     */
    public function title(): string
    {
    return 'Raw Scores';
}

}

?>