<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJemaatRequest;
use App\Http\Requests\UpdateJemaatRequest;
use App\Repositories\JemaatRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class JemaatController extends AppBaseController
{
    /** @var  JemaatRepository */
    private $jemaatRepository;

    public function __construct(JemaatRepository $jemaatRepo)
    {
        $this->jemaatRepository = $jemaatRepo;
    }

    /**
     * Display a listing of the Jemaat.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $jemaats = $this->jemaatRepository->paginate(10);

        return view('jemaats.index')
            ->with('jemaats', $jemaats);
    }

    /**
     * Show the form for creating a new Jemaat.
     *
     * @return Response
     */
    public function create()
    {
        return view('jemaats.create');
    }

    /**
     * Store a newly created Jemaat in storage.
     *
     * @param CreateJemaatRequest $request
     *
     * @return Response
     */
    public function store(CreateJemaatRequest $request)
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

        Flash::success('Jemaat saved successfully.');

        return redirect(route('jemaats.index'));
    }

    /**
     * Display the specified Jemaat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jemaat = $this->jemaatRepository->find($id);

        if (empty($jemaat)) {
            Flash::error('Jemaat not found');

            return redirect(route('jemaats.index'));
        }

        return view('jemaats.show')->with('jemaat', $jemaat);
    }

    /**
     * Show the form for editing the specified Jemaat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jemaat = $this->jemaatRepository->find($id);

        if (empty($jemaat)) {
            Flash::error('Jemaat not found');

            return redirect(route('jemaats.index'));
        }

        return view('jemaats.edit')->with('jemaat', $jemaat);
    }

    /**
     * Update the specified Jemaat in storage.
     *
     * @param int $id
     * @param UpdateJemaatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJemaatRequest $request)
    {
        $jemaat = $this->jemaatRepository->find($id);

        //////////////

        if (empty($jemaat)) {
            Flash::error('Jemaat not found');

            return redirect(route('jemaats.index'));
        }

        ////////////

        $input = $request->all();

        if ($request->hasFile('kartuVaksin')) {

            //Validate the uploaded file
            $Validation = $request->validate([

                'kartuVaksin' => 'required|mimes:png,jpg,jpeg|max:2048'
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

        $jemaat = $this->jemaatRepository->update($input, $id);

        
        //////////
        Flash::success('Jemaat updated successfully.');

        return redirect(route('jemaats.index'));
    }

    /**
     * Remove the specified Jemaat from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jemaat = $this->jemaatRepository->find($id);

        if (empty($jemaat)) {
            Flash::error('Jemaat not found');

            return redirect(route('jemaats.index'));
        }

        $this->jemaatRepository->delete($id);

        Flash::success('Jemaat deleted successfully.');

        return redirect(route('jemaats.index'));
    }
}
