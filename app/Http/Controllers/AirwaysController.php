<?php

namespace App\Http\Controllers;

use App\DataTables\AirwaysDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAirwaysRequest;
use App\Http\Requests\UpdateAirwaysRequest;
use App\Repositories\AirwaysRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Airway_age_group;
use App\Models\Airways;
use Illuminate\Support\Facades\DB;

class AirwaysController extends AppBaseController
{
    /** @var AirwaysRepository $airwaysRepository*/
    private $airwaysRepository;

    public function __construct(AirwaysRepository $airwaysRepo)
    {
        $this->airwaysRepository = $airwaysRepo;
    }

    /**
     * Display a listing of the Airways.
     *
     * @param AirwaysDataTable $airwaysDataTable
     *
     * @return Response
     */
    public function index(AirwaysDataTable $airwaysDataTable)
    {
        return $airwaysDataTable->render('airways.index');
    }

    /**
     * Show the form for creating a new Airways.
     *
     * @return Response
     */
    public function create()
    {
        return view('airways.create');
    }

    /**
     * Store a newly created Airways in storage.
     *
     * @param CreateAirwaysRequest $request
     *
     * @return Response
     */
    public function store(CreateAirwaysRequest $request)
    {
        try {
            DB::beginTransaction();

            $input = $request->all();

            $airways = $this->airwaysRepository->create($input);
    
            for($i=0;$i<count($request->price);$i++){
                Airway_age_group::create([
                    'name_en'=>$request->age_group_en[$i],
                    'name_hu'=>$request->age_group_hu[$i],
                    'name_sk'=>$request->age_group_sk[$i],
                    'name_de'=>$request->age_group_de[$i],
                    'min'=>$request->min[$i],
                    'max'=>$request->max[$i],
                    'price'=>$request->price[$i],
                    'airway_id'=>$airways->id,
                ]);
            }
            DB::commit();

            Flash::success('Airways saved successfully.');
    
            return redirect(route('airways.index'));
        } catch (\Throwable $th) {
            DB::rollBack();
            Flash::error('Airways not found');
            return redirect(route('airways.index'));
        }

    }

    /**
     * Display the specified Airways.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        // $airways = $this->airwaysRepository->find($id);
       $airways= Airways::with(['airway_age_groups'])->find($id);
        if (empty($airways)) {
            Flash::error('Airways not found');

            return redirect(route('airways.index'));
        }

        return view('airways.show')->with('airways', $airways);
    }

    /**
     * Show the form for editing the specified Airways.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        // $airways = $this->airwaysRepository->find($id);
        $airways= Airways::with(['airway_age_groups'])->find($id);
        // return $airways;
        if (empty($airways)) {
            Flash::error('Airways not found');

            return redirect(route('airways.index'));
        }

        return view('airways.edit')->with('airways', $airways);
    }

    /**
     * Update the specified Airways in storage.
     *
     * @param int $id
     * @param UpdateAirwaysRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAirwaysRequest $request)
    {

        try {
            DB::beginTransaction();

            Airway_age_group::where('airway_id', $id)->delete();

            for($i=0;$i<count($request->price);$i++){
                $data=  ['name_en'=>$request->age_group_en[$i],
                'name_hu'=>$request->age_group_hu[$i],
                'name_sk'=>$request->age_group_sk[$i],
                'name_de'=>$request->age_group_de[$i],
                'min'=>$request->min[$i],
                'max'=>$request->max[$i],
                'price'=>$request->price[$i],
                'airway_id'=>$id];
    
            $flight = Airway_age_group::create($data);
            
        }
            $airways = $this->airwaysRepository->find($id);
    
            if (empty($airways)) {
                Flash::error('Airways not found');
    
                return redirect(route('airways.index'));
            }
    
            $airways = $this->airwaysRepository->update($request->all(), $id);
            
            DB::commit();

            Flash::success('Airways updated successfully.');
    
            return redirect(route('airways.index'));
        } catch (\Throwable $th) {
            DB::rollBack();
            Flash::error('Airways not found');
            return redirect(route('airways.index'));
        }
       
    }

    /**
     * Remove the specified Airways from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {       
        $airways = $this->airwaysRepository->find($id);

        if (empty($airways)) {
            Flash::error('Airways not found');

            return redirect(route('airways.index'));
        }

        try {
            DB::beginTransaction();
            Airway_age_group::where('airway_id', $id)->delete();
            $this->airwaysRepository->delete($id);
            DB::commit();
            Flash::success('Airways deleted successfully.');
            return redirect(route('airways.index'));

        } catch (\Throwable $th) {
            DB::rollBack();
            Flash::error('Airways not found');
            return redirect(route('airways.index'));
        } 





        Flash::success('Airways deleted successfully.');

        return redirect(route('airways.index'));
    }
}
