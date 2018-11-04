<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Testimonial;

class TestimonialController extends Controller
{

	private $validation_rules;

	public function __construct()
	{

		$this->validation_rules = [
			'name'		=>	'required|min:2|max:20',
			'comment'	=>	'required|min:10|max:600'
		];
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$page = [
			'title'		=>	'Testimonials',
			'backUrl'	=>	'/admin'
		];
        $testimonials = Testimonial::orderBy('order', 'ASC')->get();
		return view('admin.testimonials.index', compact('testimonials', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$page = [
			'title'		=>	'Create Testimonial',
			'backUrl'	=>	'/admin/testimonials'
		];
        $testimonial = new Testimonial;
		return view('admin.testimonials.create', compact('testimonial', 'page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$data = $request->validate($this->validation_rules);
		$data['order'] = Testimonial::count();
        $testimonial = Testimonial::create($data);

		if($testimonial){
			session()->flash('success', 'Testimonial created');
			return redirect('/admin/testimonials');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$page = [
			'title'		=>	'Edit Testimonial',
			'backUrl'	=>	'/admin/testimonials'
		];
        $testimonial = Testimonial::find($id);
		return view('admin.testimonials.edit', compact('testimonial', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::find($id);
		$data = $request->validate($this->validation_rules);

		$testimonial->name = $data['name'];
		$testimonial->comment = $data['comment'];

		if($testimonial->save()){
			session()->flash('success', 'Changes saved');
			return redirect('/admin/testimonials/');
		}

		session()->flash('error', 'Testimonial could not be saved');
		return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::destroy($id);
		if($testimonial){
			session()->flash('success', 'Testimonial deleted!');
		} else {

		}

		return redirect('/admin/testimonials');
    }

	public function delete($id)
	{
		$page = [
			'backUrl'	=>	'/admin'
		];
		$testimonial = Testimonial::find($id);
		return view('admin.testimonials.delete', compact('testimonial'));
	}

	public function sort(Request $request)
	{
		if(Testimonial::sort($request->all())){
			echo json_encode(array('status' => 'success'));
		}
	}
}
