<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAgapeRequest;
use App\Http\Requests\UpdateAgapeRequest;
use App\Repositories\AgapeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AgapeController extends AppBaseController
{
    /** @var  AgapeRepository */
    private $agapeRepository;

    public function __construct(AgapeRepository $agapeRepo)
    {
        $this->agapeRepository = $agapeRepo;
    }

    /**
     * Display a listing of the Agape.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $agapes = $this->agapeRepository->all();

        return view('agapes.index')
            ->with('agapes', $agapes);
    }

    /**
     * Show the form for creating a new Agape.
     *
     * @return Response
     */
    public function create()
    {
        return view('agapes.create');
    }

    /**
     * Store a newly created Agape in storage.
     *
     * @param CreateAgapeRequest $request
     *
     * @return Response
     */
    public function store(CreateAgapeRequest $request)
    {
        $input = $request->all();

        $agape = $this->agapeRepository->create($input);

        Flash::success('Agape saved successfully.');

        return redirect(route('agapes.index'));
    }

    /**
     * Display the specified Agape.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agape = $this->agapeRepository->find($id);

        if (empty($agape)) {
            Flash::error('Agape not found');

            return redirect(route('agapes.index'));
        }

        return view('agapes.show')->with('agape', $agape);
    }

    /**
     * Show the form for editing the specified Agape.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agape = $this->agapeRepository->find($id);

        if (empty($agape)) {
            Flash::error('Agape not found');

            return redirect(route('agapes.index'));
        }

        return view('agapes.edit')->with('agape', $agape);
    }

    /**
     * Update the specified Agape in storage.
     *
     * @param int $id
     * @param UpdateAgapeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgapeRequest $request)
    {
        $agape = $this->agapeRepository->find($id);

        if (empty($agape)) {
            Flash::error('Agape not found');

            return redirect(route('agapes.index'));
        }

        $agape = $this->agapeRepository->update($request->all(), $id);

        Flash::success('Agape updated successfully.');

        return redirect(route('agapes.index'));
    }

    /**
     * Remove the specified Agape from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agape = $this->agapeRepository->find($id);

        if (empty($agape)) {
            Flash::error('Agape not found');

            return redirect(route('agapes.index'));
        }

        $this->agapeRepository->delete($id);

        Flash::success('Agape deleted successfully.');

        return redirect(route('agapes.index'));
    }
}
