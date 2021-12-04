<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateJemaatAPIRequest;
use App\Http\Requests\API\UpdateJemaatAPIRequest;
use App\Models\Jemaat;
use App\Repositories\JemaatRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class JemaatController
 * @package App\Http\Controllers\API
 */

class JemaatAPIController extends AppBaseController
{
    /** @var  JemaatRepository */
    private $jemaatRepository;

    public function __construct(JemaatRepository $jemaatRepo)
    {
        $this->jemaatRepository = $jemaatRepo;
    }

    /**
     * Display a listing of the Jemaat.
     * GET|HEAD /jemaats
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $jemaats = $this->jemaatRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($jemaats->toArray(), 'Jemaats retrieved successfully');
    }

    /**
     * Store a newly created Jemaat in storage.
     * POST /jemaats
     *
     * @param CreateJemaatAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateJemaatAPIRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('kartuVaksin')) {

            //Validate the uploaded file
            $Validation = $request->validate([

                'kartuVaksin' => 'required|mimes:png,jpg,jpeg|max:2048    '
            ]);

            // cache the file
            $file = $Validation['kartuVaksin'];
            $originalName = $file->getClientOriginalName();


            // generate a new filename. getClientOriginalExtension() for the file extension
            $filename = 'images_' . time() . '.' . $file->getClientOriginalExtension();

            // save to storage/app/infrastructure as the new $filename
            $InfrasFileName = $file->storeAs('public', $filename);

            $path = $InfrasFileName;
        }

        $input['kartuVaksin'] = $path;


        $jemaat = $this->jemaatRepository->create($input);

        return $this->sendResponse($jemaat->toArray(), 'Jemaat saved successfully');
    }

    /**
     * Display the specified Jemaat.
     * GET|HEAD /jemaats/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Jemaat $jemaat */
        $jemaat = $this->jemaatRepository->find($id);

        if (empty($jemaat)) {
            return $this->sendError('Jemaat not found');
        }

        return $this->sendResponse($jemaat->toArray(), 'Jemaat retrieved successfully');
    }

    /**
     * Update the specified Jemaat in storage.
     * PUT/PATCH /jemaats/{id}
     *
     * @param int $id
     * @param UpdateJemaatAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $jemaat=Jemaat::find($id);
        $jemaat->update($request->all());

        $ibadah=$request->get('ibadah_id');
        $jemaat->ibadah()->associate($ibadah);
        $jemaat->save();
        return response([
            'data' => $jemaat,
            'message' => 'Jemaat updated'
        ],200);

        /** @var Jemaat $jemaat */
        // $jemaat = $this->jemaatRepository->find($id);



    }

    /**
     * Remove the specified Jemaat from storage.
     * DELETE /jemaats/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Jemaat $jemaat */
        $jemaat = $this->jemaatRepository->find($id);

        if (empty($jemaat)) {
            return $this->sendError('Jemaat not found');
        }

        $jemaat->delete();

        return $this->sendSuccess('Jemaat deleted successfully');
    }

    public function search ($request)
    {
        $data = Jemaat::where('nik', '=', $request)->get();
        if ($data->isEmpty())
        {
            return response()->json([ 'message' => 'Resource not found!' ], 404);
        } else {
            return response()->json($data, 200);

        }

    }
}
