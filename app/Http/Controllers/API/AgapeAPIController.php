<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAgapeAPIRequest;
use App\Http\Requests\API\UpdateAgapeAPIRequest;
use App\Models\Agape;
use App\Repositories\AgapeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AgapeController
 * @package App\Http\Controllers\API
 */

class AgapeAPIController extends AppBaseController
{
    /** @var  AgapeRepository */
    private $agapeRepository;

    public function __construct(AgapeRepository $agapeRepo)
    {
        $this->agapeRepository = $agapeRepo;
    }

    /**
     * Display a listing of the Agape.
     * GET|HEAD /agapes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $agapes = $this->agapeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($agapes->toArray(), 'Agapes retrieved successfully');
    }

    /**
     * Store a newly created Agape in storage.
     * POST /agapes
     *
     * @param CreateAgapeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAgapeAPIRequest $request)
    {
        $input = $request->all();

        $agape = $this->agapeRepository->create($input);

        return $this->sendResponse($agape->toArray(), 'Agape saved successfully');
    }

    /**
     * Display the specified Agape.
     * GET|HEAD /agapes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Agape $agape */
        $agape = $this->agapeRepository->find($id);

        if (empty($agape)) {
            return $this->sendError('Agape not found');
        }

        return $this->sendResponse($agape->toArray(), 'Agape retrieved successfully');
    }

    /**
     * Update the specified Agape in storage.
     * PUT/PATCH /agapes/{id}
     *
     * @param int $id
     * @param UpdateAgapeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgapeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Agape $agape */
        $agape = $this->agapeRepository->find($id);

        if (empty($agape)) {
            return $this->sendError('Agape not found');
        }

        $agape = $this->agapeRepository->update($input, $id);

        return $this->sendResponse($agape->toArray(), 'Agape updated successfully');
    }

    /**
     * Remove the specified Agape from storage.
     * DELETE /agapes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Agape $agape */
        $agape = $this->agapeRepository->find($id);

        if (empty($agape)) {
            return $this->sendError('Agape not found');
        }

        $agape->delete();

        return $this->sendSuccess('Agape deleted successfully');
    }
}
