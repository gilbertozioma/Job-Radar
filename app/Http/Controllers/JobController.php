<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    // Show all Jobs
    public function index()
    {
        // Retrieve and filter jobs based on tag and search parameters
        return view('jobradar.index', [
            'jobs' => Jobs::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // Show single job using Route Model Binding
    public function show(Jobs $one_job)
    {
        return view('jobradar.show', [
            'single_job' => $one_job
        ]);
    }

    // Show Create Job Page
    public function create()
    {
        return view('jobradar.create');
    }

    // Store newly created job
    public function store(Request $request)
    {
        // Validate form fields
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('jobs', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        // Store job logo if uploaded
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // Associate the job with the authenticated user
        $formFields['user_id'] = auth()->id();

        // Create the job
        Jobs::create($formFields);

        // Redirect to the home page with a flash message indicating successful submission
        return redirect('/')->with('message', 'Submission Successful!');
    }

    // Show job edit form
    public function edit(Jobs $one_job)
    {
        return view('jobradar.edit', ['one_job' => $one_job]);
    }

    // Update an existing job
    public function update(Request $request, Jobs $one_job)
    {
        // Verify if the authenticated user is authorized to update the job
        if ($one_job->user_id != auth()->id()) {
            abort(403, 'Unauthorized Access Denied.');
        }

        // Validate form fields
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        // Update job logo if uploaded
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // Update the job
        $one_job->update($formFields);

        // Redirect to the home page with a flash message indicating successful update
        return redirect('/')->with('message', 'Update Successful!');
    }

    // Delete a job
    public function destroy(Jobs $one_job)
    {
        // Verify if the authenticated user is authorized to delete the job
        if ($one_job->user_id != auth()->id()) {
            abort(403, 'Unauthorized Access Denied.');
        }

        // Delete the job
        $one_job->delete();

        // Redirect to the home page with a flash message indicating successful deletion
        return redirect('/')->with('message', 'Job deleted successfully!');
    }

    // Manage jobs for the authenticated user
    public function manage()
    {
        // Retrieve jobs associated with the authenticated user
        return view('jobradar.manage', ['jobs' => auth()->user()->jobs()->get()]);
    }
}
