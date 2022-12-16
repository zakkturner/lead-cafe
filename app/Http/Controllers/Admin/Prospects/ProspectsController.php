<?php

namespace App\Http\Controllers\Admin\Prospects;

use App\Exports\ProspectsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Prospects\StoreProspectRequest;
use App\Models\Prospect;
use Illuminate\Http\Request;
use GoogleSearch;
use Maatwebsite\Excel\Facades\Excel;
class ProspectsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $prospects = Prospect::latest();
        if(request('search')){
            dd(request('search'));
            $prospects->where('company', 'like', '%' . request('search'). '%');
        }
        //Show all prospects and manage
        return view('admin.prospects.index', ['prospects' => $prospects->paginate(20)]);

    }

    public function all()
    {
        return Prospect::all();
    }

    public function filteredProspect()
    {
        $prospects = Prospect::latest();
        if(request('search')){
           $prospects = $prospects->where('company', 'like', '%' . request('search'). '%')->get();
        }
        //Show all prospects and manage
        return $prospects;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Go to the prospect creation form
        return view('admin.prospects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\StoreProspectRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProspectRequest $request)
    {
        $prospect = Prospect::create([
            'contact' => $request->contact,
            'company' => $request->company,
            'phone_one' => $request->phone_one,
            'phone_two' => $request->phone_two,
            'website' => $request->website,
            'address' => $request->address,
            'email' => $request->email,
            'position' => $request->position,
            'notes' => $request->notes,

        ]);


        // store prospect
        return redirect()->route('admin.prospects.dashboard')->with('success', 'successfully created a new prospect');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $prospect = Prospect::findOrFail($id);
        return view('admin.prospects.show', compact('prospect'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return string
     */
    public function update(Request $request, $id)
    {

        $prospect = Prospect::findOrFail($id)->update($request->all());
        return 'updated successfully';



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse,
     */
    public function destroy($id)
    {

        $prospect = Prospect::findOrFail($id)->delete();
        if (\request()->wantsJson()) {
            return response()->json([
                'alert_delete' => 'Selected query is deleted successfully.'
            ]);
        }

        return redirect()->to('/prospects')->with('success', 'Selected query is deleted successfully.');

    }

    public function search(Request $request)
    {
        $results = null;
        // q is the user input query
        $q = '';
        //if the request is not empty
        if ( ! empty($request->input('query')))
        {
            $q = $request->input('query');
            $query = [
                "engine" => "google_maps",
                "type" => "search",
                "google_domain" => "google.com",
                "q" => $q,
                "hl" => "en",
                "ll" => "@33.7455096,-84.0083012,14z",
               "num" => "50"
            ];

            $search = new GoogleSearch('869a3e4a2dd98e6eb454e4b2da28e81ebcd7762ff2f71a71c732a1dc353de165');
            $results = $search->get_json($query)->local_results;



        }



        return view('admin.prospects.search')->with('results', $results);
//        return view('admin.prospects.search', );
    }

    public function get_prospect_data(){
        return Excel::download(new ProspectsExport, 'prospects.xlsx');
    }
}

