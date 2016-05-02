<table class="table">
    <thead>
    <th>Parent Id</th>
			<th>Name</th>
			<th>Url</th>
			<th>Newpage</th>
			<th>Content</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($sessionPages as $sessionPage)
        <tr>
            <td>{!! $sessionPage->parent_id !!}</td>
			<td>{!! $sessionPage->name !!}</td>
			<td>{!! $sessionPage->url !!}</td>
			<td>{!! $sessionPage->newpage !!}</td>
			<td>{!! $sessionPage->content !!}</td>
            <td>
                <a href="{!! route('sessions.pages.edit', [$session_id,$sessionPage->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('sessionPages.delete', [$sessionPage->id]) !!}" onclick="return confirm('Are you sure wants to delete this SessionPage?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
