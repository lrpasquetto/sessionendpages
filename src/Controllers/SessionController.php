<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use App\Libraries\Repositories\SessionRepository;
use App\Session;
use App\Http\Controllers\Controller;
use Flash;
use Response;

class SessionController extends Controller
{

	/** @var  SessionRepository */
	private $sessionRepository;

	function __construct(SessionRepository $sessionRepo)
	{
		$this->sessionRepository = $sessionRepo;
	}

	/**
	 * Display a listing of the Session.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sessions = Session::where('parent_id',0)->paginate(10);

		return view('sessions.index')
			->with('sessions', $sessions);
	}

	/**
	 * Show the form for creating a new Session.
	 *
	 * @return Response
	 */
	public function create()
	{
        $sessions = Session::where('parent_id',0)->lists('name','id')->prepend('Nenhum', '0');
        return view('sessions.create',compact('sessions'));
	}

	/**
	 * Store a newly created Session in storage.
	 *
	 * @param CreateSessionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateSessionRequest $request)
	{
		$input = $request->all();

		$session = $this->sessionRepository->create($input);


		return redirect(route('sessions.index'));
	}

	/**
	 * Display the specified Session.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$session = $this->sessionRepository->find($id);

		if(empty($session))
		{

			return redirect(route('sessions.index'));
		}

		return view('sessions.show')->with('session', $session);
	}

	/**
	 * Show the form for editing the specified Session.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$session = $this->sessionRepository->find($id);

		if(empty($session))
		{

			return redirect(route('sessions.index'));
		}
        $sessions = Session::where('parent_id',0)->lists('name','id')->prepend('Nenhum', '0');
		return view('sessions.edit',compact('sessions'))->with('session', $session);
	}

	/**
	 * Update the specified Session in storage.
	 *
	 * @param  int              $id
	 * @param UpdateSessionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateSessionRequest $request)
	{
		$session = $this->sessionRepository->find($id);

		if(empty($session))
		{

			return redirect(route('sessions.index'));
		}

		$session = $this->sessionRepository->updateRich($request->all(), $id);


		return redirect(route('sessions.index'));
	}

	/**
	 * Remove the specified Session from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$session = $this->sessionRepository->find($id);

		if(empty($session))
		{

			return redirect(route('sessions.index'));
		}

		$this->sessionRepository->delete($id);


		return redirect(route('sessions.index'));
	}
}
