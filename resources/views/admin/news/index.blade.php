@extends('admin.masternews')
@section('content')
<table border="1px" width="100%">
    <tr >
        <td>Title</td>
        <td>Author</td>
        <td>Intro</td>
        <td>Content</td>
        <td>Image</td>
        <td>Status</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    @foreach( $news as $item )
        @php
            $image = asset('uploads_news/'.$item->image);
        @endphp
    <tr>
        <td>{{$item->title}}</td>
        <td>{{$item->author}}</td>
        <td>{{$item->intro}}</td>
        <td>{{$item->content}}</td>
        <td><img src="{{$image}}" width="30px"></td>
        <td>{{$item->status}}</td>
        <td><a href="{{route('admin.news.edit',$item->id)}}">Edit</a></td>
        <td><a href="{{route('admin.news.destroy', $item->id)}}">Delete</a></td>
    </tr>
    @endforeach
</table>
@endsection
