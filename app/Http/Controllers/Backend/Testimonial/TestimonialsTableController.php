<?php

namespace App\Http\Controllers\Backend\Testimonial;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use App\Repositories\Backend\Testimonial\TestimonialRepository;
use App\Http\Requests\Backend\Testimonial\ManageTestimonialRequest;

/**
 * Class TestimonialsTableController.
 */
class TestimonialsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var TestimonialRepository
     */
    protected $testimonial;

    /**
     * contructor to initialize repository object
     * @param TestimonialRepository $testimonial;
     */
    public function __construct(TestimonialRepository $testimonial)
    {
        $this->testimonial = $testimonial;
    }

    /**
     * This method return the data of the model
     * @param ManageTestimonialRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageTestimonialRequest $request){
        return Datatables::of($this->testimonial->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('comment-full', function ($testimonial) {
                            return $testimonial->comment;
                        })
            ->addColumn('comment', function ($testimonial) {
                            return Str::words($testimonial->comment, $words = 10, $end = '..');
                        })
            ->addColumn('created_at', function ($testimonial) {
                return Carbon::parse($testimonial->created_at)->toDateString();
            })
            ->make(true);
    }
}
