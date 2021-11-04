<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateIbadahAPIRequest;
use App\Http\Requests\API\UpdateIbadahAPIRequest;
use App\Models\Ibadah;
use App\Repositories\IbadahRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class IbadahController
 * @package App\Http\Controllers\API
 */

class IbadahAPIController extends AppBaseController
{
    /** @var  IbadahRepository */
    private $ibadahRepository;

    public function __construct(IbadahRepository $ibadahRepo)
    {
        $this->ibadahRepository = $ibadahRepo;
    }

    /**
     * Display a listing of the Ibadah.
     * GET|HEAD /ibadahs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $ibadahs = $this->ibadahRepository->all(
        //     $request->except(['skip', 'limit']),
        //     $request->get('skip'),
        //     $request->get('limit')
            
        // );

        $ibadahs = Ibadah::with(['jemaat'])->get();

        return $this->sendResponse($ibadahs->toArray(), 'Ibadahs retrieved successfully');
    }

    /**
     * Store a newly created Ibadah in storage.
     * POST /ibadahs
     *
     * @param CreateIbadahAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateIbadahAPIRequest $request)
    {
        $input = $request->all();

        $ibadah = $this->ibadahRepository->create($input);

        return $this->sendResponse($ibadah->toArray(), 'Ibadah saved successfully');
    }

    /**
     * Display the specified Ibadah.
     * GET|HEAD /ibadahs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Ibadah $ibadah */
        $ibadah = $this->ibadahRepository->find($id);

        if (empty($ibadah)) {
            return $this->sendError('Ibadah not found');
        }

        return $this->sendResponse($ibadah->toArray(), 'Ibadah retrieved successfully');
    }

    /**
     * Update the specified Ibadah in storage.
     * PUT/PATCH /ibadahs/{id}
     *
     * @param int $id
     * @param UpdateIbadahAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIbadahAPIRequest $request)
    {
        $input = $request->all();

        /** @var Ibadah $ibadah */
        $ibadah = $this->ibadahRepository->find($id);

        if (empty($ibadah)) {
            return $this->sendError('Ibadah not found');
        }

        $ibadah = $this->ibadahRepository->update($input, $id);

        return $this->sendResponse($ibadah->toArray(), 'Ibadah updated successfully');
    }

    /**
     * Remove the specified Ibadah from storage.
     * DELETE /ibadahs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Ibadah $ibadah */
        $ibadah = $this->ibadahRepository->find($id);

        if (empty($ibadah)) {
            return $this->sendError('Ibadah not found');
        }

        $ibadah->delete();

        return $this->sendSuccess('Ibadah deleted successfully');
    }
}
