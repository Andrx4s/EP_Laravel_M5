<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Competencies\CompetenciesCreateValidation;
use App\Http\Requests\Admin\Competencies\CompetenciesUpdateValidation;
use App\Models\Competence;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    /**
     * Вызов страницы со всеми компетенциями
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $competencies = Competence::all();
        return view('admin.competencies.index', compact('competencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        $request->session()->flashInput([]);
        return view('admin.competencies.createOrUpdate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CompetenciesCreateValidation $request)
    {
        $validate = $request->validated();
        Competence::create($validate);
        return redirect()->route('admin.competencies.index')->with(['create' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Competence  $competence
     * @return \Illuminate\Http\Response
     */
    public function show(Competence $competence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competence  $competence
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Competence $competency)
    {
        $competence = $competency;
        $request->session()->flashInput($competence->toArray());
        return view('admin.competencies.createOrUpdate', compact('competence'));
    }

    /**
     * @param CompetenciesUpdateValidation $request
     * @param Competence $competence
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CompetenciesUpdateValidation $request, Competence $competency)
    {
        $validate = $request->validated();
        $competence = $competency;
        $competence->update($validate);
        return redirect()->route('admin.competencies.index')->with(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competence  $competence
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Competence $competency)
    {
        $competency->delete();
        return back()->with(['delete' => true]);
    }
}
