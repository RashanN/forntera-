<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\MembersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Member;

class MemberController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        Excel::import(new MembersImport, $request->file('file'));

        return redirect()->back()->with('success', 'Members Imported Successfully!');
    }
    public function showSearchForm()
    {
        return view('conform');
    }
    public function showResults(Request $request)
    {
        dd($request);
        $request->validate([
            'gc_code' => 'nullable|string'
        ]);

        $gcCode = $request->input('gc_code');

        // Search for members with the specified GC code
        $members = Member::where('GCcode', 'LIKE', "%$gcCode%")->get();

        return view('results', ['members' => $members]);
    }
   

    public function search(Request $request)
    {
        //dd( $request);
        // Retrieve the gc_code from the request
        $gc_code = $request->input('gc_code');

        // Validate the input
        $request->validate([
            'gc_code' => 'required|string|max:255',
        ]);

        // Query the members table for matching GC codes
        $members = Member::where('GCcode', $gc_code)->get();

        // Return the results view with the search results
        return view('results', [
            'gc_code' => $gc_code,
            'members' => $members
        ]);
    }
    public function conform($id)
    {
        // Find the member by ID
        $member = Member::find($id);

        if ($member) {
            // Update the conform column
            $member->conform = 1;
            $member->save();

            return redirect()->route('conform.form')->with('success', 'Member has been confirmed.');
        } else {
            return redirect()->route('conform.form')->with('error', 'Member not found.');
        }
    }
    public function showConfirmed()
    {
        // Fetch members with conform value of 1
        $members = Member::where('conform', 1)->get();

        // Return view with members data
        return view('activemembers', ['members' => $members]);
    }
    public function fetchConfirmedMembers()
    {
        $members = Member::where('conform', 1)->get();
        return response()->json($members);
    }

}
