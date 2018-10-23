<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Lead;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = Lead::latest()->simplePaginate(30);
		return view('admin.leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$lead = new Lead;
        return view('admin.leads.create', compact('lead'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
			'name'		=>	'required|min:2|max:40',
			'phone'		=>	'required|min:10|max:20',
			'email'		=>	'required|email|max:190',
			'message'	=>	'required|min:5|max:300'
		]);

		$lead = Lead::create($data);

		if($lead){
			session()->flash('success', 'Lead created');
			return redirect('/admin/leads');
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
        $lead = Lead::find($id);

		// Mark unread when shown
		if($lead->unread) {
			$lead->unread = false;
			$lead->save();
		}
		return view('admin.leads.show', compact('lead'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lead = Lead::find($id);
		return view('admin.leads.edit', compact('lead'));
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
        $lead = Lead::find($id);

		$data = $request->validate([
			'name'		=>	'required|min:2|max:40',
			'phone'		=>	'required|min:10|max:20',
			'email'		=>	'required|email|max:190',
			'message'	=>	'required|min:5|max:300'
		]);

		$lead->name = $data['name'];
		$lead->email = $data['email'];
		$lead->phone = $data['phone'];
		$lead->message = $data['message'];

		if($lead->save()){
			session()->flash('success', 'Changes saved!');
			return redirect('/admin/leads/' . $lead->id);
		} else {

		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lead = Lead::destroy($id);

		if($lead){
			session()->flash('success', 'Lead deleted!');
		} else {

		}

		return redirect('/admin/leads');
    }

	public function delete($id)
	{
		$lead = Lead::find($id);
		return view('admin.leads.delete', compact('lead'));
	}

	public function search(Request $request)
	{
		$leads = Lead::whereDate('created_at', date('Y-m-d', strtotime($request->searchDate)))->latest()->simplePaginate(30);
		return view('admin.leads.index', compact('leads'));
	}
}
