<?php

namespace App\Exports\Report\Scared;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

class MasterSheet implements FromCollection, WithTitle {

    public function __construct($collScale) {
        $this->collScale = $collScale;
    }

    public function collection() {
        return $this->collScale;
    }

    /**
     * @return string
     */
    public function title(): string
    {
    return 'Cut Off';
}

}

?>