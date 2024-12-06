@extends('admin.master')

@section('title', 'Category Create')
@section('content')

<table border="1px" width="100%">
    <tr>
        <td>Id</td>
        <td>Images</td>
        <td>Name</td>
        <td>Created At</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>

    @forelse ($categories as $item)
        @php
            $image = file_exists(public_path('uploads/'.$item->image))? asset('uploads/'.$item->image) : asset('uploads/not_found.png');
        @endphp
        <tr>
            <td>{{$loop->iteration}}</td>
            <td><img src="{{$image}}" width="30px"/></td>
            <td>{{$item->name}}</td>
            <td>{{date("d-m-Y H:i:s" ,strtotime($item->created_at))}}</td>
            <td><a href={{ route('admin.category.edit', ['id' => $item->id])}}>Edit</a></td>
            <td><a onClick="return checkDelete('Bạn có chắc muốn xóa không? ')" href={{ route('admin.category.destroy', ['id' => $item->id])}}>Delete</a></td>
        </tr>
    @empty
        <tr>
            <td colspan="6" align="center">No Category</td>
        </tr>
    @endforelse
</table>
@endsection