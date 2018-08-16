<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateJiraRequest;
use App\Models\Jira;
use App\User;
use Illuminate\Support\Facades\Hash;

class JiraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateJiraRequest $request)
    {
        $user = User::where('email',$request->email)->first();
        $last_jira = Jira::orderBy('id', 'DESC')->first();
        $last_jira_id = ($last_jira) ? $last_jira->id : 1;

        if (password_verify($request->password, $user->password))
        {
            $fields = $request->fields;

            $jira = new Jira();
            $jira->project_key = $fields["project"]["key"];
            $jira->issue_name = $fields["project"]["key"] . "-" . $last_jira_id;
            $jira->serial_no = isset($fields["customfield_10900"]) ? $fields["customfield_10900"] : null;
            $jira->location = isset($fields["customfield_10902"]["value"]) ? $fields["customfield_10902"]["value"] : null;
            $jira->supplier = isset($fields["customfield_10903"]["value"]) ? $fields["customfield_10903"]["value"] : null;
            $jira->terminal_id = isset($fields["customfield_10904"]) ? $fields["customfield_10904"] : null;
            $jira->merchant_id = isset($fields["customfield_10905"]) ? $fields["customfield_10905"] : null;
            $jira->created_by = $user->id;
            $jira->save();

            $data = [
                "status" => "200",
                "description" => "Stock has been created successful.",
                "fields" => $fields
            ];
        }
       
        return response()->json($data);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
