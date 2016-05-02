<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSessionPageRequest;
use App\Http\Requests\UpdateSessionPageRequest;
use App\Libraries\Repositories\SessionPageRepository;
use App\Session;
use App\SessionPage;
use App\Http\Controllers\Controller;
use Flash;
use Response;

class SessionPageController extends Controller
{

	/** @var  SessionPageRepository */
	private $sessionPageRepository;

	function __construct(SessionPageRepository $sessionPageRepo)
	{
		$this->sessionPageRepository = $sessionPageRepo;
	}

	/**
	 * Display a listing of the SessionPage.
	 *
	 * @return Response
	 */
	public function index($session_id)
	{
		$sessionPages = SessionPage::where('parent_id',$session_id)->paginate(20);

		return view('sessionPages.index',compact('session_id'))
			->with('sessionPages', $sessionPages);
	}

	/**
	 * Show the form for creating a new SessionPage.
	 *
	 * @return Response
	 */
	public function create($session_id)
	{
		return view('sessionPages.create',compact('session_id'));
	}

	/**
	 * Store a newly created SessionPage in storage.
	 *
	 * @param CreateSessionPageRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateSessionPageRequest $request)
	{
		$input = $request->all();

		$sessionPage = $this->sessionPageRepository->create($input);


		return redirect(route('sessions.pages.index',[$sessionPage->parent_id]));
	}

	/**
	 * Display the specified SessionPage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$sessionPage = $this->sessionPageRepository->find($id);

		if(empty($sessionPage))
		{

			return redirect(route('sessionPages.index'));
		}

		return view('sessionPages.show')->with('sessionPage', $sessionPage);
	}

	/**
	 * Show the form for editing the specified SessionPage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($session_id,$id)
	{
		$sessionPage = $this->sessionPageRepository->find($id);

		if(empty($sessionPage))
		{

			return redirect(route('sessions.pages.index'),compact('session_id'));
		}

		return view('sessionPages.edit',compact('session_id'))->with('sessionPage', $sessionPage);
	}

	/**
	 * Update the specified SessionPage in storage.
	 *
	 * @param  int              $id
	 * @param UpdateSessionPageRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateSessionPageRequest $request)
	{
		$sessionPage = $this->sessionPageRepository->find($id);

		if(empty($sessionPage))
		{

			return redirect(route('sessions.pages.index'),compact('session_id'));
		}

		$sessionPage = $this->sessionPageRepository->updateRich($request->all(), $id);
        $sessionPage = $this->sessionPageRepository->find($id);
        $session_id  = $sessionPage->parent_id;


		return redirect(route('sessions.pages.index',[$session_id]));
	}

	/**
	 * Remove the specified SessionPage from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$sessionPage = $this->sessionPageRepository->find($id);

		if(empty($sessionPage))
		{

			return redirect(route('sessionPages.index'));
		}

		$this->sessionPageRepository->delete($id);


		return redirect(route('sessions.pages.index',[$sessionPage->parent_id]));
	}
}
