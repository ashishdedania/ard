<?php

namespace App\Exports\Report\Progress;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Repositories\Backend\Report\ReportRepository;

class Export implements FromCollection {

    /**
     *
     * @param type $arrHeader
     * @param type $arrCollection
     */
    public function __construct($arrHeader, $arrCollection) {
        $this->arrHeader = $arrHeader;
        $this->arrCollection = $arrCollection;
        $this->repository = new ReportRepository();
    }

    public function collection() {
        $collection = collect(array_values($this->arrCollection))->prepend($this->arrHeader);
        return $collection;
    }

}

?>