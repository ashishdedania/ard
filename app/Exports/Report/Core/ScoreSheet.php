<?php

namespace App\Exports\Report\Core;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

class ScoreSheet implements FromCollection, WithTitle {

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
    return 'Final Scores';
}

}

?>