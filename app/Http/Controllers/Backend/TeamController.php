<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\TeamDataTable;
use App\Helpers\FileHelper;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Backend\CreateTeamRequest;
use App\Http\Requests\Backend\UpdateTeamRequest;
use App\Models\Team;
use Flash;
use Illuminate\Support\Fluent;
use phpDocumentor\Reflection\Types\Collection;
use Response;

class TeamController extends AppBaseController
{
    /**
     * Display a listing of the Team.
     *
     * @param TeamDataTable $teamDataTable
     * @return Response
     */
    public function index(TeamDataTable $teamDataTable)
    {
        return $teamDataTable->render('backend.teams.index');
    }

    /**
     * Show the form for creating a new Team.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.teams.create');
    }

    /**
     * Store a newly created Team in storage.
     *
     * @param CreateTeamRequest $request
     *
     * @return Response
     */
    public function store(CreateTeamRequest $request)
    {
        $input = $request->all();

        $social = [
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'pinterest' => $request->pinterest,
            'linkedin' => $request->linkedin,
        ];

        $image = FileHelper::uploadImage($request);

        /** @var Team $team */
        $team = Team::create(array_merge($input, ['social' => json_encode($social), 'image' => $image]));

        Flash::success('Team saved successfully.');

        return redirect(route('admin.teams.index'));
    }

    /**
     * Display the specified Team.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Team $team */
        $team = Team::find($id);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route('admin.teams.index'));
        }

        return view('backend.teams.show')->with('team', $team);
    }

    /**
     * Show the form for editing the specified Team.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Team $team */
        $data = Team::find($id)->toArray();

        $social = json_decode($data['social'],true);

        $socials = [
            'facebook' => $social['facebook'],
            'twitter' => $social['twitter'],
            'instagram' => $social['instagram'],
            'pinterest' => $social['pinterest'],
            'linkedin' => $social['linkedin'],
        ];

        $team =  new Fluent(array_merge($data,$socials));


        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route('admin.teams.index'));
        }

        return view('backend.teams.edit')->with('team', $team);
    }

    /**
     * Update the specified Team in storage.
     *
     * @param int $id
     * @param UpdateTeamRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeamRequest $request)
    {
        /** @var Team $team */
        $team = Team::find($id);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route('admin.teams.index'));
        }

        $social = [
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'pinterest' => $request->facebook,
            'linkedin' => $request->facebook,
        ];

        $image = FileHelper::uploadImage($request, 'image', $team);

        /** @var Team $team */

        $team->fill(array_merge($request->all(), ['social' => json_encode($social), 'image' => $image]));
        $team->save();

        Flash::success('Team updated successfully.');

        return redirect(route('admin.teams.index'));
    }

    /**
     * Remove the specified Team from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var Team $team */
        $team = Team::find($id);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route('admin.teams.index'));
        }

        FileHelper::deleteImage($team);
        $team->delete();

        Flash::success('Team deleted successfully.');

        return redirect(route('admin.teams.index'));
    }
}
