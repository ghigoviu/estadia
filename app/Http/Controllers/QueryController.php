<?php

namespace App\Http\Controllers;

use App\Models\Query;
use Illuminate\Http\Request;

/**
 * Class QueryController
 * @package App\Http\Controllers
 */
class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queries = Query::paginate();

        return view('query.index', compact('queries'))
            ->with('i', (request()->input('page', 1) - 1) * $queries->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $query = new Query();
        return view('query.create', compact('query'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Query::$rules);

        $query = Query::create($request->all());

        return redirect()->route('queries.index')
            ->with('success', 'Query created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query = Query::find($id);

        return view('query.show', compact('query'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $query = Query::find($id);

        return view('query.edit', compact('query'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Query $query
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Query $query)
    {
        request()->validate(Query::$rules);

        $query->update($request->all());

        return redirect()->route('queries.index')
            ->with('success', 'Query updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $query = Query::find($id)->delete();

        return redirect()->route('queries.index')
            ->with('success', 'Query deleted successfully');
    }
}
