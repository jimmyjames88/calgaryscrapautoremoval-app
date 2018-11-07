<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Lead;
use App\Jobs\SendSubmissionEmail;
use Mail;
use App\Mail\WebsiteSubmission;

class LeadController extends Controller
{

	public function __construct()
	{
		$this->validation_rules = [
			'name'		=>	'required|min:2|max:40',
			'phone'		=>	'required|min:10|max:20',
			'email'		=>	'required|email|max:190',
			'message'	=>	'required|min:5|max:300'
		];
	}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$page = [
			'title'		=>	'Leads',
			'backUrl'	=>	'/admin'
		];

		if($request->order && $request->order){
			$backUrl = '/admin/leads';
			$leads = Lead::orderBy($request->order)->simplePaginate(30);
		} else {
			$leads = Lead::latest()->simplePaginate(30);
		}


		return view('admin.leads.index', compact('leads', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$page = [
			'title'		=>	'Create Lead',
			'backUrl'	=>	'/admin/leads'
		];
		$lead = new Lead;
        return view('admin.leads.create', compact('lead', 'page'));
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
		$page = [
			'title'		=>	$lead->name,
			'backUrl'	=>	'/admin/leads'
		];


		// Mark unread when shown
		if($lead->unread) {
			$lead->markRead();
		}
		return view('admin.leads.show', compact('lead', 'page'));
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
			'title'		=>	'Edit Lead #' . $id,
			'backUrl'	=>	'/admin/leads/' . $id
		];
        $lead = Lead::find($id);
		return view('admin.leads.edit', compact('lead', 'page'));
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

		$data = $request->validate($this->validation_rules);

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
		$page = [
			'backUrl'	=>	'/admin/leads/' . $id
		];
		$lead = Lead::find($id);
		return view('admin.leads.delete', compact('lead', 'page'));
	}

	public function search(Request $request)
	{
		$page = [
			'title'		=>	$request->searchDate,
			'backUrl'	=>	'/admin/leads'
		];

		$leads = Lead::whereDate('created_at', date('Y-m-d', strtotime($request->searchDate)))->latest()->simplePaginate(30);
		return view('admin.leads.index', compact('leads', 'page'));
	}

	public function submission(Request $request)
	{
		// form validation
		$data = $request->validate($this->validation_rules);

		// Store new POSTed lead
		$lead = Lead::create($data);
		if($lead){

			// Send emails to users with email-alerts permission
			$recipients = \App\User::withPermission('email-alerts');
			if($recipients->count()){
				foreach($recipients as $recipient){
					$emails[] = $recipient->email;
				}
			}
			// Consider moving this to a dedicated email controller?
			if(isset($emails)){
				Mail::to($emails)
				    ->send(new WebsiteSubmission($lead));
			}
			// return ajax success response
			return [
				'status'	=>	'success',
				'message' 	=> 	'Thanks! Your submission has been received. We\'ll get back to you shortly!'
			];
		}
		// return ajax fail response
		return false;


	}
}
